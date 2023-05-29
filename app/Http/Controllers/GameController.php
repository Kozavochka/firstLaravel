<?php

namespace App\Http\Controllers;

use App\Events\SendGameMail;
use App\Http\Requests\GameRequest;
use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function index()
    {
       $games = Game::query()
       ->with('clubs')
       ->get();

       return $games;
    }


    public function create()
    {
        //
    }


    public function store(GameRequest $request)
    {
        $data = $request->validated();
//        dd($data);
        $game = Game::query()->create($data);//создание игры

        $game->clubs()->sync($data['clubs']);
//        event(new SendGameMail($game));
        return new GameResource($game);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
