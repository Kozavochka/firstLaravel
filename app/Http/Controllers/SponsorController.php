<?php

namespace App\Http\Controllers;

use App\Http\Requests\SponsorRequest;
use App\Http\Resources\SponsorResource;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SponsorController extends Controller
{

    public function index()//GET - получение всех сущностей
    {
        $page = request('page', 1);
        $perPage = request('per_page', 5);
        //Вместе с relation - всеми полями клуба
//        $sponsors=Sponsor::query()->with(['clubs'])->paginate($perPage, '*', 'page', $page);

        //Только с количеством клубов у каждого спонсора
        $sponsors=Sponsor::query()->withCount(['clubs'])
            ->paginate($perPage, '*', 'page', $page);

        return view('sponsor', compact('sponsors'));


        /*return SponsorResource::collection(
            QueryBuilder::for(Sponsor::class)
               // ->with(['clubs'])
                ->allowedFilters([
                    'type',//фильтр содержания по типу
                    AllowedFilter::exact('location'),//точечный по локации
                    AllowedFilter::callback('has_clubs', function (Builder $query, $value) {
                       $query->whereHas('clubs');
                    //                       $query->doesntHave('clubs'); // проверка на отсутствие relation
                    //                        $query->whereHas('orders', null, '>=', $value);
                    })
                ])
                ->paginate($perPage, '*', 'page', $page)
        );*/
    }


    public function create()
    {
        return view('admin.sponsors.create');
    }


    public function store(SponsorRequest $request)
    {
        $data = $request->prepareData();

        Sponsor::query()
            ->create($data);

        return redirect(route('admin'));
//        $spons=Sponsor::query()->create($data);

//        return new SponsorResource($spons);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function update(SponsorRequest $request, Sponsor $sponsor)//PATCH/PUT запрос. PATCH - обновление сущ. . PUT - положить новую запись
    {
        $data=$request->prepareData();

        $sponsor->update($data);

        return new SponsorResource($sponsor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
