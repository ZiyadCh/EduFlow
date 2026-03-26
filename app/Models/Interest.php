<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $fillable = [
        'student_id',
        'name',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
