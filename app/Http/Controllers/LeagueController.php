<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeagueRequest;
use App\Http\Resources\LeagueResource;
use App\Models\League;
use Illuminate\Http\Request;

class LeagueController extends Controller
{

    public function index()
    {
        $leagues = League::query()->with(['clubs', 'players'])->get();

        return  LeagueResource::collection($leagues);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(LeagueRequest $request)
    {
        //получение данных из запроса
        $data=$request->validated();

        $league=League::query()->create($data);

        return new LeagueResource($league);
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
