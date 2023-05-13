<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;
use App\Http\Resources\PlayerResource;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{

    public function index()
    {
        //Получение игроков, меньше 30-ли лет, запросом
       /* $data = Player::query()
            ->with(['club'])
            ->where('age','<',30)
            ->get();*/

            //Пагинация
        /*$data = Player::query()
            ->where('age','<',30)
            ->paginate(2);*/


        //Получение клуба через отношение
       /* foreach ($data as $player){
                dump($player->club->name);
        }*/


        //Строка с текстом
       /* dump($data->reduce(function($str, $player) {
            return $str . ' | ' . $player->name .' plays in '. $player->club->name;
        }, ''));*/

        //Вывод игрока и его клуба
//        dd($data->pluck('club.name','name'));

        $data=Player::query()
            ->with('club')
//            ->old()
            ->get();

        return PlayerResource::collection($data);
    }


    public function create()
    {
        //
    }


    public function store(PlayerRequest $request)//POST запрос - сохранение сущности
    {
        //получение данных из запроса
        $data=$request->prepareData();

        //dd($data);

        //создание сущности клуба
        $club = Player::query()->create($data);

        // вывод данных в JSON формате с помощью ресурса
        return new PlayerResource($club);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(PlayerRequest $request, Player $player)
    {//PATCH/PUT запрос. PATCH - обновление сущ. . PUT - положить новую запись
        $data=$request->prepareData();

        $player->update($data);

        return new PlayerResource($player);
    }


    public function destroy($id)
    {
        //
    }
}
