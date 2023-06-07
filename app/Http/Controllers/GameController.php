<?php

namespace App\Http\Controllers;


use App\Http\Requests\GameRequest;
use App\Http\Resources\GameResource;
use App\Models\Game;

use App\Services\Games\Contracts\GamesPdfServiceContract;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class GameController extends Controller
{

    private $pdfSerivce;

    public function __construct(GamesPdfServiceContract $pdfServ)
    {
        $this->pdfSerivce = $pdfServ;
    }

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


    public function show(Game $game)
    {

        return view('show.game_show', compact('game'));
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


    public function pdf_export(Game $game)
    {
        $this->pdfSerivce->export($game);
    }
}
