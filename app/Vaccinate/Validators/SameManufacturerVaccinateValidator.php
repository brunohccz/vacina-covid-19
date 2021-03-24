<?php

namespace App\Vaccinate\Validators;

use App\Models\Patient;
use App\Models\Vaccine;
use App\Vaccinate\Contracts\VaccinateValidator;
use Illuminate\Validation\ValidationException;

class SameManufacturerVaccinateValidator implements VaccinateValidator
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
        if ($patient->wasVaccinated && $patient->vaccinate->id !== $vaccine->id) {
            throw ValidationException::withMessages([
                'vaccinate' => 'Paciente vacinado com vacina de outro fabricante.'
            ]);
        }
    }
}
