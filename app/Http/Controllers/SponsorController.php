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
       // $data = Sponsor::query()->get();
        $page = request('page', 1);
        $perPage = request('per_page', 1);

//        $data =Sponsor::query()->with(['clubs'])->paginate($perPage, '*', 'page', $page);
//       dd($data->pluck('name'));

        return SponsorResource::collection(
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
        );
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


    public function store(SponsorRequest $request)
    {
        $data = $request->prepareData();

        $spons=Sponsor::query()->create($data);

        return new SponsorResource($spons);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SponsorRequest $request, $id)
    {
        //
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
