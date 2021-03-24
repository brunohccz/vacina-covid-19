<?php

namespace App\Vaccinate;

use App\Models\Patient;
use App\Models\Vaccinate;
use App\Models\Vaccine;
use App\Vaccinate\Contracts\VaccinateValidator;

class VaccinateService
{
    /** @var VaccinateValidator */
    protected VaccinateValidator $validator;

    /**
     * VaccinateService constructor.
     *
     * @param VaccinateValidator $validator
     */
    public function __construct(VaccinateValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Vaccinate patient
     *
     * @param int $patient_id
     * @param int $vaccine_id
     * @return Vaccinate
     */
    public function vaccinate(int $patient_id, int $vaccine_id): Vaccinate
    {
        $patient = Patient::find($patient_id);
        $vaccine = Vaccine::find($vaccine_id);

        $this->validator->validate($patient, $vaccine);

        if ($patient->wasVaccinated) {
            $times = ++$patient->vaccinate->times;
        }

        return $patient->vaccinate()->updateOrCreate(
            [
                'patient_id' => $patient_id,
                'vaccine_id' => $vaccine_id
            ],
            [
                'times' => $times ?? 1,
                'vaccinated_at' => now()
            ]
        );
    }
}
