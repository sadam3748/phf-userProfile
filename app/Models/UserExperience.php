<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserExperience extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'organization_type',
        'organization_name',
        'position_title',
        'certificate_image',
        'noc_image',
        'from_date',
        'to_date',
        'is_working',
        'deleted_at',
    ];
}
