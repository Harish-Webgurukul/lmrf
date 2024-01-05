<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;

    public function getEnrollmentDateAttribute()
    {
        return Carbon::parse($this->attributes['enrollment_date'])->format('d-M-Y');
    }
    public function getExpectedDeliveryDateAttribute()
    {
        return Carbon::parse($this->attributes['enrollment_date'])->format('d-M-Y');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'staff_id',
        'study_id',
        'facility_id',
        'firstname',
        'lastname',
        'email',
        'contact1',
        'contact2',
        'proxy_contact1',
        'proxy_contact2',
        'facility',
        'address',
        'landmark',
        'city',
        'pincode',
        'enrollment_date',
        'expected_delivery_date',
        'delivery_date',
        'is_deleted'
    ];

    public function Biweeklycalls(): HasMany
    {
        return $this->hasMany(Biweeklycall::class, 'study_id', 'study_id');
    }

    public function ancvisitis(): HasMany
    {
        return $this->hasMany(Ancvisit::class, 'patient_id', 'id');
    }

    public function ilsfollowups(): HasMany
    {
        return $this->hasMany(Ilsfollowup::class, 'patient_id', 'id');
    }
}
