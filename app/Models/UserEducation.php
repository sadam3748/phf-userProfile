<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{
    use HasFactory;

    protected $table = 'user_educations';

    protected $fillable = [
        'user_id',
        'education_level',
        'obtain_marks',
        'institute',
        'total_marks',
        'degree_image',
        'passing_date',
    ];
}
