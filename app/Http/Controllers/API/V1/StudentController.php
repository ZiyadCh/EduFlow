<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function enroll($course_id)
    {
        $course = Course::findOrFail($course_id);
        $user = auth('api')->user();
        $user->student->courses()->syncWithoutDetaching($course->id);
        return response()->json(['message' => 'Enrolled successfully'], 200);
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
