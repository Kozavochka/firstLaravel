<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClubRequest;
use App\Models\Club;
use App\Models\League;
use App\Models\Player;
use App\Models\Sponsor;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AdminClubController extends Controller
{

    public function index()
    {
        $page = request('page', 1);
        $perPage = request('per_page', 5);

        $clubs = Club::query()->with(['sponsor', 'players'])->paginate($perPage, '*', 'page', $page);

        return view('admin.clubs', compact('clubs'));
    }

    public function club_players()
    {
        $client = new Client();
        $club = Club::query()->find(4);

        //Получение api_id клуба
        $response_club = $client->request('GET', 'https://v3.football.api-sports.io/teams'.
            "?name={$club->name}",
            [
                'headers' => [
                    'X-RapidAPI-Host' => 'v3.football.api-sports.io',
                    'X-RapidAPI-Key' => env('MY_FOOTBALL_API_KEY'),
                ],
            ]);
        $data_club = json_decode($response_club->getBody(), true);
        $club_key=$data_club['response'][0]['team']['id'];

        //Получение игроков
        $response_players = $client->request('GET', 'https://v3.football.api-sports.io/players/squads?' .
            "team={$club_key}",
            [
                'headers' => [
                    'X-RapidAPI-Host' => 'v3.football.api-sports.io',
                    'X-RapidAPI-Key' => env('MY_FOOTBALL_API_KEY'),
                ],
            ]);

        $data_players = json_decode($response_players->getBody(), true);
//        dd($data_players['response'][0]['players']);

        //Заполнение информации
        foreach ($data_players['response'][0]['players'] as $player){

            Player::query()
                ->create([
                    'name' => $player['name'],
                    'age' => $player['age'],
                    'club_id' => $club->id,
                ]);

        }
        dd('Ok');
    }


    public function create()
    {
        $leagues = League::query()
            ->distinct()
            ->get();

        $sponsors = Sponsor::query()
            ->distinct()
            ->get();

        return view('admin.clubs.create', compact('leagues', 'sponsors'));
    }


    public function store(ClubRequest $request)
    {
        $data = $request->prepareData();

        Club::query()
            ->updateOrCreate($data);

        return redirect(route('admin'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
