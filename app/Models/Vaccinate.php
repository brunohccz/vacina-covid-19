<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vaccinate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'vaccine_id',
        'times',
        'vaccinated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'vaccinated_at' => 'datetime',
    ];

    /**
     * @return BelongsTo
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class)->withTrashed();
    }

    /**
     * @return BelongsTo
     */
    public function vaccine(): BelongsTo
    {
        return $this->belongsTo(Vaccine::class)->withTrashed();
    }
}
