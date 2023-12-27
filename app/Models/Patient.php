<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
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
        'in_person_from_visit2',
        'in_person_to_visit2',
        'in_person_to_status2',
        'in_person_visit2_completed',
        'in_person_note2',
        'in_person_from_visit3',
        'in_person_to_visit3',
        'in_person_to_status3',
        'in_person_visit3_completed',
        'in_person_note3',
        'in_person_from_visit4',
        'in_person_to_visit4',
        'in_person_to_status4',
        'in_person_visit4_completed',
        'in_person_note4',
        'in_person_from_visit5',
        'in_person_to_visit5',
        'in_person_to_status5',
        'in_person_visit5_completed',
        'in_person_note5',
        'in_person_from_visit_final',
        'in_person_to_visit_final',
        'in_person_to_statusfinal',
        'in_person_visitfinal_completed',
        'in_person_notefinal',
        'is_deleted'
    ];

    public function Biweeklycalls(): HasMany
    {
        return $this->hasMany(Biweeklycall::class, 'study_id', 'study_id');
    }
}
