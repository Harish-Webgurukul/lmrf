<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'facility_unique_id',
        'address',
        'landmark',
        'email',
        'city',
        'pincode',
        'is_deleted'
    ];
    // public function patients(): HasMany
    // {
    //     return $this->hasMany(Patient::class, 'facility_id', 'id');
    // }
}
