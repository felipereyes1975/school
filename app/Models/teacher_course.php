<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class teacher_course extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'teacher_id',
        'course_id',
        'group',
        'created_by',
        'updated_by'
    ];
}
