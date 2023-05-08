<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PlayerRequest extends FormRequest
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
                'max:30',
                'required',
                Rule::unique('players')->ignore($this->route('player')),
            ],
            'age' =>[
                'required',
                'integer',
            ],
            'is_free' => 'boolean',

            'club_id' => [
                'integer',
                'nullable',
                Rule::exists('clubs','id'),
            ]
        ];
    }
    public function prepareData()
    {
        return $this->validated();
    }
}
