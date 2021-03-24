<?php

namespace App\Vaccinate\Validators;

use App\Models\Patient;
use App\Models\Vaccinate;
use App\Models\Vaccine;
use App\Vaccinate\Contracts\VaccinateValidator;
use Illuminate\Validation\ValidationException;

class DoseIntervalVaccinateValidator implements VaccinateValidator
{
    /**
     * Validate
     *
     * @param Patient $patient
     * @param Vaccine $vaccine
     * @throws ValidationException
     */
    public function validate(Patient $patient, Vaccine $vaccine)
    {
        if ($patient->wasVaccinated && $patient->vaccinate->vaccinated_at->diffInDays(now()) < $vaccine->interval) {
            throw ValidationException::withMessages([
                "vaccinate" => "Aguarde o intervalo da vacina."
            ]);
        }

    }
}
