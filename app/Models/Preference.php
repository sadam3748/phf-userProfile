<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Preference extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_preferences';
    protected $fillable = [
        'user_id',
        'order',
        'nursing_college_id',
        'deleted_at'
    ];

    /**
     * @return BelongsTo
     */
    public function nursingCollege(): BelongsTo
    {
        return $this->belongsTo(NursingCollege::class,'nursing_college_id','id');
    }
}
