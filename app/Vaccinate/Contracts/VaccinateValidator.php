<?php

namespace App\Vaccinate\Contracts;

use App\Models\Patient;
use App\Models\Vaccine;

interface VaccinateValidator
{
    /**
     * Validate
     *
     * @param Patient $patient
     * @param Vaccine $vaccine
     */
    public function validate(Patient $patient, Vaccine $vaccine);
}
