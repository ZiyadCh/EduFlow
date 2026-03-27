<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Interest;
use Illuminate\Http\Request;

class InterestController
{
    public function index()
    {
        $student = auth('api')->user()->student;

        if (!$student) {
            return response()->json(['error' => 'Student profile not found'], 404);
        }

        return response()->json([
            'interests' => $student->interests,
        ]);
    }

    public function store(Request $request)
    {
        $student = auth('api')->user()->student;

        if (!$student) {
            return response()->json(['error' => 'Student profile not found'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $interest = $student->interests()->create([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Interest added successfully',
            'interest' => $interest,
        ], 201);
    }

    public function destroy(Interest $interest)
    {
        $student = auth('api')->user()->student;

        if (!$student || $interest->student_id !== $student->id) {
            return response()->json(['error' => 'Unauthorized or interest not found'], 403);
        }

        $interest->delete();

        return response()->json([
            'message' => 'Interest removed successfully',
        ]);
    }
}
