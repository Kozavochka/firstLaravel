<?php

namespace App\Http\Controllers;


use App\Http\Requests\GameRequest;
use App\Http\Resources\GameResource;
use App\Models\Game;
use Dompdf\Dompdf;
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


    public function show(Game $game)
    {
        dd($game);

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
        $data = [
            'title' => 'Отчёт игры',
        ];

        $pdf = new Dompdf();
        $pdf->loadHtml(view('pdf.game_pdf', compact('data', 'game')));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        return $pdf->stream('game.pdf');
    }
}
