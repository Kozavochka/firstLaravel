<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


//Обработка, валидация запроса
class ClubRequest extends FormRequest
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
                Rule::unique('clubs')->ignore($this->route('clubs')),
            ],
            'description' => [
                'string',
                'nullable'
            ],
            'players_count' => [
                'integer',
                'nullable'
            ],
            'sponsor_id' => [
                'integer',
                Rule::exists('sponsors','id'),
            ],
            'league_id' =>
            [
                'integer',
                Rule::exists('leagues','id'),
            ]
        ];
    }

    public function prepareData()
    {
        return $this->validated();
    }
}
