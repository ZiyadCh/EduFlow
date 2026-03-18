<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return response()->json(Group::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|integer|exists:courses,id',
            'membres'   => 'required|integer|min:1',
        ]);

        $group = Group::create($validated);

        return response()->json($group, 201);
    }

    public function show(Group $group)
    {
        return response()->json($group, 200);
    }

    public function update(Request $request, Group $group)
    {
        $validated = $request->validate([
            'course_id' => 'sometimes|integer|exists:courses,id',
            'membres'   => 'sometimes|integer|min:1',
        ]);

        $group->update($validated);

        return response()->json($group, 200);
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return response()->json(null, 204);
    }
}
