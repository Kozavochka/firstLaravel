<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClubRequest;
use App\Models\Club;
use App\Models\League;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class AdminClubController extends Controller
{

    public function index()
    {
        $page = request('page', 1);
        $perPage = request('per_page', 5);

        $clubs=Club::query()->with(['sponsor', 'players'])->paginate($perPage, '*', 'page', $page);

        return view('admin.clubs',compact('clubs'));
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
    public function update(Request $request, $id)
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
