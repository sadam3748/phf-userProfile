<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Preference extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'user_preferences';
    protected $fillable = [
        'user_id',
        'nursing_colleges',
        'deleted_at'
    ];
}
