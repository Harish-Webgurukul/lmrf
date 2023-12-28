<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Facility extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'facility_name',
        'address',
        'landmark',
        'email',
        'city',
        'pincode',
    ];

    public function patient(): HasOne
    {
        return $this->hasOne(Patient::class, 'facility_id', 'id');
    }
}
