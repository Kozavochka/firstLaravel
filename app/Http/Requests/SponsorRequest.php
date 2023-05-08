<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SponsorRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                Rule::unique('sponsors')->ignore($this->route('sponsors')),
            ],
            'type' => [
                'string',
                'max:30',
            ],
            'location' => [
                'string',
                'max:50',
            ]
        ];
    }

    public function prepareData()
    {
        return $this->validated();
    }
}
