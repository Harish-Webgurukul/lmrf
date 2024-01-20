<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ancvisit extends Model
{
    use HasFactory;

    public function getFromDateAttribute()
    {

        return $this->attributes['from_date'] == null ?  " " : Carbon::parse($this->attributes['from_date'])->format('d-M-Y');
    }
    public function getToDateAttribute()
    {
        return $this->attributes['to_date'] == null ?  " " : Carbon::parse($this->attributes['to_date'])->format('d-M-Y');
    }
    public function getVisitCompletedOnAttribute()
    {

        return $this->attributes['visit_completed_on'] == null ?  "Pending" : Carbon::parse($this->attributes['visit_completed_on'])->format('d-M-Y');
        // if ($this->attributes['visit_completed_on'] != NULL) {
        //     return Carbon::parse($this->attributes['visit_completed_on'])->format('d-M-Y');
        // }
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
        'visit_number',
        'from_date',
        'to_date',
        'status',
        'visit_completed_on',
        'note',
        'is_deleted'
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
}
