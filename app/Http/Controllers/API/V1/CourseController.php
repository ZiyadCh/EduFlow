<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of all courses.
     */
    public function index()
    {
        return response()->json(Course::all(), 200);
    }

    /**
     * Store a newly created course in storage.
     */
    public function store(Request $request)
    {
        $course = Course::findOrFail($course_id);
        $student = auth('api')->user()->student;

        if (!$student) {
            return response()->json(['error' => 'Student profile not found'], 404);
        }

        $student->courses()->syncWithoutDetaching([$course->id]);

        $group = $course->groups()
            ->withCount('students')
            ->having('membres', '<', 25)
            ->first();

        if (!$group) {
            $group = $course->groups()->create();
        }

        $student->groups()->syncWithoutDetaching([$group->id]);

        return response()->json([
            'message' => 'Enrolled successfully',
            'course' => $course->topic,
            'group_id' => $group->id,
        ]);

    }

    /**
     * Display a specific course.
     */
    public function show(int $id)
    {
        $course = Course::where('id', $id)->get();
        if (!$course) {
            return response()->json(["error" => "no course found"], 404);
        }
        return response()->json($course, 200);
    }

    /**
     * Update the specified course.
     */
    public function update(Request $request, Course $course)
    {


        $fields = $request->validate([
            'topic' => 'string|max:255',
            'price' => 'numeric|min:0',
        ]);

        $course->update($fields);

        return response()->json($course, 200);
    }

    /**
     * Remove the specified course.
     */
    public function destroy(Course $course)
    {


        $course->delete();

        return response()->json(['message' => 'Course deleted'], 200);
    }
}
