<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NursingCollege extends Model
{
    use HasFactory;

    protected $table = 'nursing_colleges';

    protected $fillable = [
        'name',
    ];
}
