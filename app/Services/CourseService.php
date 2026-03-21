<?php

namespace App\Services;

use App\Models\Course;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CourseService
{
    public function __construct(
        protected CourseRepositoryInterface $courseRepository
    ) {}

    public function getAllCourses(): Collection
    {
        return $this->courseRepository->getAll();
    }

    public function getCourseById(int $id): ?Course
    {
        return $this->courseRepository->findById($id);
    }

    public function createCourse(array $data, int $teacherId): array
    {
        $course = $this->courseRepository->create([
            'topic'      => $data['topic'],
            'price'      => $data['price'],
            'teacher_id' => $teacherId,
        ]);

        $group = $course->groups()->create([
            'course_id' => $course->id,
            'membres'   => 0,
        ]);

        return compact('course', 'group');
    }

    public function updateCourse(Course $course, array $data): Course
    {
        return $this->courseRepository->update($course, $data);
    }

    public function deleteCourse(Course $course): void
    {
        $this->courseRepository->delete($course);
    }
}
