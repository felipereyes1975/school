<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'desc',
        'semester',
        'Teacher_id',
        'Matter_id',
        'Classroom_id',
        'created_by',
        'updated_by'
    ];
}
