<?php

namespace App\Services\Clubs\Contracts;

use App\Models\Club;

interface ClubServiceContract
{
    public function getClubs():void;
    public function getDescription():void;

}
