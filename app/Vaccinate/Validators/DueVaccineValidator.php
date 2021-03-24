<?php


namespace App\Vaccinate\Validators;


use App\Models\Patient;
use App\Models\Vaccine;
use App\Vaccinate\Contracts\VaccinateValidator;
use Illuminate\Validation\ValidationException;

class DueVaccineValidator implements VaccinateValidator
{
    /**
     * Due vaccine validator
     *
     * @param Patient $patient
     * @param Vaccine $vaccine
     * @throws ValidationException
     */
    public function validate(Patient $patient, Vaccine $vaccine)
    {
        if($vaccine->due->isPast()) {
            throw ValidationException::withMessages([
                'vaccinate' => 'Vacina vencida.'
            ]);
        }
    }
}
