<?php

namespace App\Services\Clubs;

use App\Models\Club;
use App\Services\Clubs\Contracts\ClubServiceContract;

class ClubService implements ClubServiceContract
{
    public function getClubs(): void
    {
        $clubs=Club::query()->get();

//        dd($clubs->pluck('description', 'name'));
        /*$club_decription=$clubs->map(function ($item, $key){
           return $item->name." - ".$item->description;
        });*/

    }
    public function getDescription(): void
    {
        //пасхаор4ка
    }
}
