<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VaccineResource extends JsonResource
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
            'id' => $this->id,
            'manufacturer' => $this->manufacturer,
            'batch' => $this->batch,
            'doses' => $this->doses,
            'due' => $this->due,
            'interval' => $this->interval
        ];
    }
}
