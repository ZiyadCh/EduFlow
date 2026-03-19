<?php

namespace App\Repositories;

use App\Models\Course;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CourseRepository implements CourseRepositoryInterface
{
    public function getAll(): Collection
    {
        return Course::with('groups')->get();
    }

    public function findById(int $id): ?Course
    {
        return Course::with('groups')->find($id);
    }

    public function create(array $data): Course
    {
        return Course::create($data);
    }

    public function update(Course $course, array $data): Course
    {
        $course->update($data);
        return $course->fresh();
    }

    public function delete(Course $course): void
    {
        $course->delete();
    }
}
