<?php

namespace App\Http\Requests\Vaccine;

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
            'manufacturer' => 'required|string|unique:vaccines,manufacturer',
            'batch' => 'required|string',
            'doses' => 'required|numeric',
            'due' => 'required|date',
            'interval' => 'required|numeric'
        ];
    }
}
