<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Course;
use App\Models\Interest;
use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\IncompletePayment;

class StudentController extends Controller
{
    //enrolling in a course function
    public function enroll($course_id)
    {
        $course  = Course::findOrFail($course_id);
        $student = auth('api')->user()->student;

        if (!$student) {
            return response()->json(['error' => 'Student profile not found'], 404);
        }

        if ($student->courses()->whereKey($course->id)->exists()) {
            return response()->json(['error' => 'Already enrolled'], 409);
        }

        $session = auth('api')->user()->checkoutCharge(
            $course->price * 100,
            $course->topic,
            1,
            [
                'metadata'    => [
                    'course_id'  => $course->id,
                    'student_id' => $student->id,
                ],
            ]
        );

        return response()->json(['checkout_url' => $session->url]);
    }

    //unenrolling in a course
    public function unenroll($course_id)
    {
        $course = Course::findOrFail($course_id);
        $student = auth('api')->user()->student;

        if (!$student) {
            return response()->json(['error' => 'Student profile not found'], 404);
        }

        if (!$student->courses()->whereKey($course->id)->exists()) {
            return response()->json(['error' => 'Not enrolled in this course'], 409);
        }
        $group = $student->groups()
            ->where('groups.course_id', $course->id)
            ->first();


        if ($group) {
            $student->groups()->detach($group->id);
            $group->decrement('membres');
        }

        $student->courses()->detach($course->id);

        return response()->json(['message' => 'Unenrolled successfully']);
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

    //afficher les cours favorise
    public function showFavorites()
    {
        $student = auth('api')->user()->student;
        $favorites = $student->favorites()->with('course')->get();

        return response()->json([
            'message' => 'votre courses sauvegardé',
            'favorites'  => $favorites,
        ]);
    }

    //user choses their interests
    public function addInterest(Request $request)
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
        ]);
    }

    //user deltes an interest
    public function removeInterest(Interest $interest)
    {
        $student = auth('api')->user()->student;

        if (!$student) {
            return response()->json(['error' => 'Student profile not found'], 404);
        }

        if ($interest->student_id !== $student->id) {
            return response()->json(['error' => 'Interest does not belong to you'], 403);
        }

        $interest->delete();

        return response()->json([
            'message' => 'Interest removed successfully',
        ]);
    }

    //show all  interests for this student
    public function showInterest(Interest $interest)
    {

        $student = auth('api')->user();
        $interests = $student->interests()->get();

        return response()->json([
            'interests' => $interests,
        ]);

    }

    //list of courses accordin to interest
    public function feed()
    {
        $student = auth('api')->user()->student;

        if (!$student) {
            return response()->json(['error' => 'Student profile not found'], 404);
        }

        $interestNames = $student->interests->pluck('name')->toArray();

        $courses = Course::whereIn('topic', $interestNames)->get();

        return response()->json([
            'courses' => $courses,
        ]);
    }

}
