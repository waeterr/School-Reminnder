<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AssignmentController extends Controller
{
    public function index($classroomId)
    {
        $classroom = Classroom::findOrFail($classroomId);
        $user = Auth::user();

        if (!$classroom->isMember($user->id)) {
            return response()->json([
                'success' => false,
                'message' => 'You are not a member of this classroom'
            ], 403);
        }

        $assignments = Assignment::with(['creator', 'submissions' => function($query) use ($user) {
                $query->where('student_id', $user->id);
            }])
            ->where('classroom_id', $classroomId)
            ->orderBy('due_date', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $assignments
        ]);
    }

    public function store(Request $request, $classroomId)
    {
        $classroom = Classroom::findOrFail($classroomId);
        $user = Auth::user();

        if ($classroom->teacher_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Only the teacher can create assignments'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'points' => 'required|integer|min:0|max:1000',
            'due_date' => 'required|date|after:now',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $assignment = Assignment::create([
            'title' => $request->title,
            'description' => $request->description,
            'classroom_id' => $classroomId,
            'created_by' => $user->id,
            'points' => $request->points,
            'due_date' => $request->due_date,
            'attachments' => $request->attachments ?? [],
        ]);

        return response()->json([
            'success' => true,
            'data' => $assignment->load('creator'),
            'message' => 'Assignment created successfully'
        ], 201);
    }

    public function show($classroomId, $id)
    {
        $assignment = Assignment::with(['creator', 'classroom', 'submissions'])
            ->where('classroom_id', $classroomId)
            ->findOrFail($id);

        $user = Auth::user();
        $classroom = $assignment->classroom;

        if (!$classroom->isMember($user->id)) {
            return response()->json([
                'success' => false,
                'message' => 'You are not a member of this classroom'
            ], 403);
        }

        // For students, only show published assignments
        if ($user->isStudent() && $assignment->status !== 'published') {
            return response()->json([
                'success' => false,
                'message' => 'This assignment is not available'
            ], 403);
        }

        return response()->json([
            'success' => true,
            'data' => $assignment
        ]);
    }

    public function update(Request $request, $classroomId, $id)
    {
        $assignment = Assignment::where('classroom_id', $classroomId)
            ->findOrFail($id);

        $user = Auth::user();

        if ($assignment->created_by !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Only the creator can update this assignment'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'points' => 'sometimes|required|integer|min:0|max:1000',
            'due_date' => 'sometimes|required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $assignment->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $assignment,
            'message' => 'Assignment updated successfully'
        ]);
    }

    public function destroy($classroomId, $id)
    {
        $assignment = Assignment::where('classroom_id', $classroomId)
            ->findOrFail($id);

        $user = Auth::user();

        if ($assignment->created_by !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Only the creator can delete this assignment'
            ], 403);
        }

        $assignment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Assignment deleted successfully'
        ]);
    }

    public function submissions($classroomId, $id)
    {
        $assignment = Assignment::with(['submissions.student', 'submissions.grader'])
            ->where('classroom_id', $classroomId)
            ->findOrFail($id);

        $user = Auth::user();

        if ($assignment->created_by !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Only the teacher can view submissions'
            ], 403);
        }

        return response()->json([
            'success' => true,
            'data' => $assignment->submissions
        ]);
    }
}