<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function interests()
    {
        return $this->hasMany(Interest::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
