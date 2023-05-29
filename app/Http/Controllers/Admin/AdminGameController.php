<?php

namespace App\Http\Controllers\Admin;

use App\Events\SendGameMail;
use App\Http\Controllers\Controller;
use App\Http\Requests\GameRequest;
use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Http\Request;

class AdminGameController extends Controller
{

    public function index()
    {
        $page = request('page', 1);
        $perPage = request('per_page', 10);

       $games = Game::query()
       ->with('clubs')
       ->paginate($perPage, '*', 'page', $page);
       return view('admin.games', compact('games'));
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
