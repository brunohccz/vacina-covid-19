<?php

namespace App\Http\Requests\Vaccine;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'manufacturer' => 'required|string',
            'batch' => 'required|string',
            'doses' => 'required|numeric',
            'due' => 'required|date',
            'interval' => 'required|numeric'
        ];
    }
}
