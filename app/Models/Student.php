<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
    ];
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
