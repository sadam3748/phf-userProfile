<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserEducation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_educations';

    protected $fillable = [
        'user_id',
        'education_level',
        'obtain_marks',
        'institute',
        'total_marks',
        'degree_image',
        'passing_date',
        'deleted_at',
    ];
}
