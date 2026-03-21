<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //enrolling in a course function
    public function enroll($course_id)
    {
        $course = Course::findOrFail($course_id);

        $student = auth('api')->user()->student;

        if (!$student) {
            return response()->json(['error' => 'Student profile not found'], 404);
        }

        $student->courses()->syncWithoutDetaching([$course->id]);

        $group = $course->groups()
            ->where('membres', '<', 25)
            ->oldest()
            ->first();

        if (!$group) {
            $group = $course->groups()->create();
        }

        $group->increment('membres');

        $student->groups()->syncWithoutDetaching([$group->id]);

        return response()->json([
            'message'  => 'Enrolled successfully',
            'course'   => $course->topic,
            'group_id' => $group->id,
        ]);
    }

    //favoriting function
    public function favorite($course_id)
    {
        $course = Course::findOrFail($course_id);
        $student = auth('api')->user()->student;

        if (!$student) {
            return response()->json(['error' => 'Student profile not found'], 404);
        }

        $favorite = $student->favorites()->where('course_id', $course->id)->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json([
                'message' => 'Course removed from favorites',
                'course'  => $course->topic,
            ]);
        }

        $student->favorites()->create([
            'course_id' => $course->id,
        ]);

        return response()->json([
            'message' => 'Course added to favorites',
            'course'  => $course->topic,
        ]);
    }

    public function retirer(Course $course)
    {
        # code...
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(q $q)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, q $q)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(q $q)
    {
        //
    }
}
