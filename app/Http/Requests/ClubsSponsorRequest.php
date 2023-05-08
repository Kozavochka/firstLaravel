<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClubsSponsorRequest extends FormRequest
{



    public function rules()
    {
        return [
            'sponsor_id' => [
                'integer',
                Rule::exists('sponsors','id'),
            ],
            'club_id' => [
                'integer',
                Rule::exists('clubs','id'),
            ],
        ];
    }
}
