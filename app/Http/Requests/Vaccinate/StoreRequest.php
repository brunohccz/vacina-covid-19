<?php

namespace App\Http\Requests\Vaccinate;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'patient_id' => 'required|numeric|exists:patients,id',
            'vaccine_id' => 'required|numeric|exists:vaccines,id'
        ];
    }
}
