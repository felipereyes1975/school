<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sessionsCourse extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'course_id',
        'hour_id',
        'day_id',
        'created_by',
        'updated_by'
    ];
}
