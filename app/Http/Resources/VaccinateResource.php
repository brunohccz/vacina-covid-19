<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VaccinateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'patient' => new PatientResource($this->patient),
            'vaccine' => new VaccineResource($this->vaccine),
            'times' => $this->times,
            'next' => $this->times < $this->vaccine->doses ? $this->vaccinated_at->addDays($this->vaccine->interval) : null,
            'vaccinated_at' => $this->vaccinated_at
        ];
    }
}
