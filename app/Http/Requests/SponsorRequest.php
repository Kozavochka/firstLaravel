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
                Rule::unique('sponsors')->ignore($this->route('sponsor')),
            ],
            'type' => [
                'string',
                'max:30',
                'nullable',
            ],
            'location' => [
                'string',
                'max:50',
                'nullable',
            ],
            'photo_url' => [
                'string',
                'nullable',
            ]
        ];
    }

    public function prepareData()
    {
        return $this->validated();
    }
}
