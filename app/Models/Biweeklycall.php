<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Biweeklycall extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'staff_id',
        'study_id',
        'patient_id',
        'call_date',
        'call_status',
        'ils_symptons_active',
        'attempt_failed',
        'home_visit',
        'notes',
    ];

    public function Patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'study_id', 'study_id');
    }
}
