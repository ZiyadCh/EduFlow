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
        $fields = $request->validate([
            'topic' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
        ]);

        $course = Course::create([
            'topic'   => $fields['topic'],
            'price'   => $fields['price'],
            'teacher_id' => auth('api')->user()->teacher->id,
        ]);

        $group = $course->groups()->create(['course_id' => $course->id,'membres' => 0]);

        return response()->json([
            'course' => $course,
            'group'  => $group,
        ], 201);

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
