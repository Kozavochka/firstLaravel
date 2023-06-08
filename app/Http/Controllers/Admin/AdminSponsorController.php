<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SponsorRequest;
use App\Http\Resources\SponsorResource;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class AdminSponsorController extends Controller
{

    public function index()//GET - получение всех сущностей
    {
        $page = request('page', 1);
        $perPage = request('per_page', 5);

        $sponsors=
            QueryBuilder::for(Sponsor::class)
                ->withCount(['clubs'])
                ->allowedFilters([
                    'type',//фильтр содержания по типу
                    AllowedFilter::exact('location'),//точечный по локации
                    AllowedFilter::callback('has_clubs', function (Builder $query, $value) {
                        $query->whereHas('clubs');
                        //                       $query->doesntHave('clubs'); // проверка на отсутствие relation
                        //                        $query->whereHas('orders', null, '>=', $value);
                    }),
                    AllowedFilter::callback('desc_order', function (Builder $query, $value){
                        $query->orderBy('clubs_count','desc');
                    })
                ])
                ->paginate($perPage, '*', 'page', $page);



        return view('admin.sponsor', compact('sponsors'));

    }


    public function create()
    {
         return view('admin.sponsors.create');
    }


    public function store(SponsorRequest $request)
    {

        $data = $request->prepareData();
//         dd($data);
        Sponsor::query()
            ->create($data);

        return redirect(route('admin'));
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
