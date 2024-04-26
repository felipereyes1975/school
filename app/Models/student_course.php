<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class student_course extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'student_id',
        'course_id',
        'group',
        'created_by',
        'updated_by'
    ];
}
