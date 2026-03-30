<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Group;

class Course extends Model
{
    protected $fillable = [
        'teacher_id',
        'name',
        'price',
        'field',
        'desc',
    ];
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
