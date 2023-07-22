<?php

namespace App\Http\Livewire;

use App\Models\Sponsor;
use Livewire\Component;

class SponsorCreate extends Component
{

    public $sponsors = [];

    public $name;
    public $type;
    public $location;

    protected function rules() {
        return [
           'sponsors.*.name' => 'required | string',
           'sponsors.*.type' => 'required | string',
           'sponsors.*.location' => 'required | string',
        ];
    }

    public function submitForm()//Автоматически перехватывает параметры
    {
        dd($this->sponsors);
    }

    public function newSponsor()
    {
        $this->sponsors[] = [

                'name' => null,
                'type' => null,
                'location' => null,

        ];
    }

    public function render()
    {
        return view('livewire.sponsor-create');
    }


}
