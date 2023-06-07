<?php

namespace App\Services\Games\Contracts;

use App\Models\Game;

interface GamesPdfServiceContract
{

    public function export(Game $game);

}
