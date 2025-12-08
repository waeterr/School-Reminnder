<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class SubmissionController extends Controller
{
    public function store(Request $request, $classroomId, $assignmentId)
    {
        $assignment = Assignment::where('classroom_id', $classroomId)
            ->findOrFail($assignmentId);

        /** @var \App\Models\Assignment $assignment */
        $assignment->load('classroom');
        /** @var \App\Models\Classroom $classroom */
        $classroom = $assignment->classroom;

        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        if (! $user instanceof \App\Models\User) {
            return response()->json(['success' => false, 'message' => 'Unauthenticated'], 401);
        }

        // Check if user is a student in this classroom
        if (! $classroom->isMember($user->id) || ! $user->isStudent()) {
            return response()->json([
                'success' => false,
                'message' => 'Only students can submit assignments'
            ], 403);
        }

        // Check if assignment is available
        if ($assignment->status !== 'published') {
            return response()->json([
                'success' => false,
                'message' => 'This assignment is not available for submission'
            ], 400);
        }

        // Check if already submitted
        $existingSubmission = Submission::where('assignment_id', $assignmentId)
            ->where('student_id', $user->id)
            ->first();

        if ($existingSubmission && $existingSubmission->status !== 'draft') {
            return response()->json([
                'success' => false,
                'message' => 'You have already submitted this assignment'
            ], 400);
        }

        $validator = Validator::make($request->all(), [
            'attachments' => 'nullable|array',
            'attachments.*' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        if ($existingSubmission) {
            // Update draft
            $existingSubmission->update([
                'attachments' => $request->attachments ?? [],
            ]);

            $submission = $existingSubmission;
        } else {
            // Create new submission
            $submission = Submission::create([
                'assignment_id' => $assignmentId,
                'student_id' => $user->id,
                'attachments' => $request->attachments ?? [],
                'status' => 'draft',
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $submission,
            'message' => 'Submission saved as draft'
        ], 201);
    }

    // Removed unused Request $request to avoid "declared but not used" warning
    public function submit($classroomId, $assignmentId)
    {
        $assignment = Assignment::where('classroom_id', $classroomId)
            ->findOrFail($assignmentId);

        /** @var \App\Models\Assignment $assignment */
        $assignment->load('classroom');
        /** @var \App\Models\Classroom $classroom */
        $classroom = $assignment->classroom;

        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        if (! $user instanceof \App\Models\User) {
            return response()->json(['success' => false, 'message' => 'Unauthenticated'], 401);
        }

        // Check if user is a student in this classroom
        if (! $classroom->isMember($user->id) || ! $user->isStudent()) {
            return response()->json([
                'success' => false,
                'message' => 'Only students can submit assignments'
            ], 403);
        }

        // Check if assignment is still open
        if ($assignment->isPastDue()) {
            return response()->json([
                'success' => false,
                'message' => 'Assignment is past due date'
            ], 400);
        }

        $submission = Submission::where('assignment_id', $assignmentId)
            ->where('student_id', $user->id)
            ->first();

        if (!$submission) {
            return response()->json([
                'success' => false,
                'message' => 'No draft submission found. Please save a draft first.'
            ], 400);
        }

        if ($submission->status !== 'draft') {
            return response()->json([
                'success' => false,
                'message' => 'Submission has already been submitted'
            ], 400);
        }

        $submission->submit();

        return response()->json([
            'success' => true,
            'data' => $submission,
            'message' => 'Assignment submitted successfully'
        ]);
    }

    public function grade(Request $request, $classroomId, $assignmentId, $id)
    {
        $submission = Submission::with('assignment')
            ->where('assignment_id', $assignmentId)
            ->findOrFail($id);

        /** @var \App\Models\Submission $submission */
        $submission->load('assignment.classroom');
        /** @var \App\Models\Classroom $classroom */
        $classroom = $submission->assignment->classroom;

        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        if (! $user instanceof \App\Models\User) {
            return response()->json(['success' => false, 'message' => 'Unauthenticated'], 401);
        }

        // Check if user is the teacher of this classroom
        if ($classroom->teacher_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Only the teacher can grade submissions'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'grade' => 'required|numeric|min:0|max:' . $submission->assignment->points,
            'feedback' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $submission->grade($request->grade, $request->feedback, $user->id);

        return response()->json([
            'success' => true,
            'data' => $submission,
            'message' => 'Submission graded successfully'
        ]);
    }

    public function mySubmissions($classroomId, $assignmentId)
    {
        $assignment = Assignment::where('classroom_id', $classroomId)
            ->findOrFail($assignmentId);

        /** @var \App\Models\Assignment $assignment */
        $assignment->load('classroom');
        /** @var \App\Models\Classroom $classroom */
        $classroom = $assignment->classroom;

        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        if (! $user instanceof \App\Models\User) {
            return response()->json(['success' => false, 'message' => 'Unauthenticated'], 401);
        }

        if (! $classroom->isMember($user->id)) {
            return response()->json([
                'success' => false,
                'message' => 'You are not a member of this classroom'
            ], 403);
        }

        /** @var \App\Models\Submission|null $submission */
        $submission = Submission::where('assignment_id', $assignmentId)
            ->where('student_id', $user->id)
            ->first();

        return response()->json([
            'success' => true,
            'data' => $submission
        ]);
    }
}