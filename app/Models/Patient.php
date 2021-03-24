<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Patient
 *
 * @property bool wasVaccinated
 * @property Vaccinate vaccinate
 * @package App\Models
 */
class Patient extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'birthday',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'birthday' => 'date',
    ];

    /**
     * @return HasOne
     */
    public function vaccinate(): HasOne
    {
        return $this->hasOne(Vaccinate::class);
    }

    /**
     * Check was vaccinated
     *
     * @return bool
     */
    public function getWasVaccinatedAttribute(): bool
    {
        return $this->vaccinate()->exists();
    }
}
