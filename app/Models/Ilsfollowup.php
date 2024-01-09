<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ilsfollowup extends Model
{
    public function getReportedOnAttribute()
    {
        return Carbon::parse($this->attributes['reported_on'])->format('d-M-Y');
    }

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
        'is_ils_active',
        'status',
        'reported_from',
        'reported_on',
        'note',
        'is_deleted'
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
}
