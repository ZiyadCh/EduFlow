<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Metadata\Group;

class Course extends Model
{
    protected $fillable = [
        'topic',
        'price',
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
