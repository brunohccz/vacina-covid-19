<?php

namespace App\Vaccinate;

use App\Models\Patient;
use App\Models\Vaccine;
use App\Vaccinate\Contracts\VaccinateValidator;
use Illuminate\Support\Collection;

class VaccinateValidatorComposite implements VaccinateValidator
{
    /** @var Collection */
    protected Collection $validators;

    /**
     * VaccinateValidatorComposite constructor.
     *
     * @param array $validators
     */
    public function __construct(array $validators)
    {
        $this->validators = collect($validators);
    }

    /**
     * Validate
     *
     * @param Patient $patient
     * @param Vaccine $vaccine
     */
    public function validate(Patient $patient, Vaccine $vaccine)
    {
        $this->validators->each(fn(VaccinateValidator $validator) => $validator->validate($patient, $vaccine));
    }
}
