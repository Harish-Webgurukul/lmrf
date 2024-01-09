<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hospitalvisit extends Model
{
    use HasFactory;
    public function getVisitDateAttribute()
    {
        return Carbon::parse($this->attributes['visit_date'])->format('d-M-Y');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'staff_id',
        'study_id',
        'patient_id',
        'visit_date',
        'visit_completed_on',
        'status',
        'reason',
        'note',
        'is_deleted'
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
}
