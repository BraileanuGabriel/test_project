<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SportsmenRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'gen' => 'required',
            'age' => 'required',
            'weight' => 'required',
            'height' => 'required',
        ];
    }
}
