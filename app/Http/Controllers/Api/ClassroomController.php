<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\ClassMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClassroomController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $classrooms = $user->enrolledClassrooms()
            ->with('teacher')
            ->withCount(['students', 'assignments'])
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $classrooms
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        
        if (!$user->isTeacher()) {
            return response()->json([
                'success' => false,
                'message' => 'Only teachers can create classrooms'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $classroom = Classroom::create([
            'name' => $request->name,
            'subject' => $request->subject,
            'section' => $request->section,
            'room' => $request->room,
            'description' => $request->description,
            'teacher_id' => $user->id,
            'class_code' => (new Classroom())->generateClassCode(),
        ]);

        // Add teacher as member
        ClassMember::create([
            'classroom_id' => $classroom->id,
            'user_id' => $user->id,
            'role' => 'teacher',
            'status' => 'active',
        ]);

        return response()->json([
            'success' => true,
            'data' => $classroom,
            'message' => 'Classroom created successfully'
        ], 201);
    }

    public function show($id)
    {
        $classroom = Classroom::with(['teacher', 'members.user'])
            ->withCount(['students', 'assignments'])
            ->findOrFail($id);

        $user = Auth::user();
        
        if (!$classroom->isMember($user->id)) {
            return response()->json([
                'success' => false,
                'message' => 'You are not a member of this classroom'
            ], 403);
        }

        return response()->json([
            'success' => true,
            'data' => $classroom
        ]);
    }

    public function update(Request $request, $id)
    {
        $classroom = Classroom::findOrFail($id);
        $user = Auth::user();

        if ($classroom->teacher_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Only the teacher can update this classroom'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'subject' => 'sometimes|required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $classroom->update($request->only([
            'name', 'subject'
        ]));

        return response()->json([
            'success' => true,
            'data' => $classroom,
            'message' => 'Classroom updated successfully'
        ]);
    }

    public function join(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_code' => 'required|string|exists:classrooms,class_code'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $classroom = Classroom::where('class_code', $request->class_code)
            ->where('status', 'active')
            ->first();

        if (!$classroom) {
            return response()->json([
                'success' => false,
                'message' => 'Classroom not found or inactive'
            ], 404);
        }

        $user = Auth::user();

        // Check if already a member
        $existingMember = ClassMember::where('classroom_id', $classroom->id)
            ->where('user_id', $user->id)
            ->first();

        if ($existingMember) {
            if ($existingMember->status === 'active') {
                return response()->json([
                    'success' => false,
                    'message' => 'You are already a member of this class'
                ], 400);
            } else {
                $existingMember->update(['status' => 'active']);
                return response()->json([
                    'success' => true,
                    'data' => $classroom,
                    'message' => 'Successfully rejoined class'
                ]);
            }
        }

        // Add as student member
        ClassMember::create([
            'classroom_id' => $classroom->id,
            'user_id' => $user->id,
            'role' => 'student',
            'status' => 'active',
        ]);

        return response()->json([
            'success' => true,
            'data' => $classroom,
            'message' => 'Successfully joined class'
        ], 201);
    }

    public function members($id)
    {
        $classroom = Classroom::findOrFail($id);
        $user = Auth::user();

        if (!$classroom->isMember($user->id)) {
            return response()->json([
                'success' => false,
                'message' => 'You are not a member of this classroom'
            ], 403);
        }

        $members = ClassMember::with('user')
            ->where('classroom_id', $id)
            ->where('status', 'active')
            ->orderBy('role')
            ->orderBy('joined_at')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $members
        ]);
    }

    public function removeMember($id, $memberId)
    {
        $classroom = Classroom::findOrFail($id);
        $user = Auth::user();

        if ($classroom->teacher_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Only the teacher can remove members'
            ], 403);
        }

        $member = ClassMember::where('classroom_id', $id)
            ->where('user_id', $memberId)
            ->firstOrFail();

        // Don't allow removing teacher
        if ($member->role === 'teacher') {
            return response()->json([
                'success' => false,
                'message' => 'Cannot remove teacher from classroom'
            ], 400);
        }

        $member->update(['status' => 'inactive']);

        return response()->json([
            'success' => true,
            'message' => 'Member removed successfully'
        ]);
    }

    public function myClassrooms()
    {
        $user = Auth::user();
        
        if ($user->isTeacher()) {
            $classrooms = $user->classroomsAsTeacher()
                ->withCount(['students', 'assignments'])
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $classrooms = $user->enrolledClassrooms()
                ->with('teacher')
                ->withCount(['students', 'assignments'])
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return response()->json([
            'success' => true,
            'data' => $classrooms
        ]);
    }
}