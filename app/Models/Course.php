<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Course extends Model
{
    use HasFactory;
    use SoftDeletes;
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
