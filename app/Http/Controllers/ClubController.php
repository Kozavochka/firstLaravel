<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubRequest;
use App\Http\Resources\ClubResource;
use App\Models\Club;
use App\Services\Clubs\Contracts\ClubServiceContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ClubController extends Controller
{
    private $clubServ;

    public function __construct(ClubServiceContract $cServ)
    {
        $this->clubServ=$cServ;
    }

    public function index()//GET - получение всех клубов
    {       $page = request('page', 1);
            $perPage = request('per_page', 10);

            $clubs=Club::query()->with(['sponsor'])->paginate($perPage, '*', 'page', $page);

//            $this->clubServ->getClubs();

            return view('clubs',compact('clubs'));

           /* return ClubResource::collection(
                QueryBuilder::for(Club::class)
                    ->with(['sponsor'])
                    ->with(['players'])
                    ->allowedFilters([
                        //наличие спонсора
                        AllowedFilter::callback('has_sponsor', function (Builder $query, $value) {
                            $query->whereHas('sponsor');
                        })
                    ])
                    ->paginate($perPage, '*', 'page', $page)
            );*/
    }


    public function create()
    {

    }


    public function store(ClubRequest $request)//POST запрос - сохранение сущности
    {
        //получение данных из запроса
        $data=$request->prepareData();

        //dd($data);

        //создание сущности клуба
        $club = Club::query()->create($data);

        // вывод данных в JSON формате с помощью ресурса
        return new ClubResource($club);
    }


    public function show(Club $club)// GET запрос, показывает один элемент из сущности
    {
        return new ClubResource($club);
    }


    public function edit($id)
    {

    }

    public function update(ClubRequest $request, Club $club)//PATCH/PUT запрос. PATCH - обновление сущ. . PUT - положить новую запись
    {
        $data=$request->prepareData();

        $club->update($data);

        return new ClubResource($club);
    }

    public function destroy(Club $club)
    {
        $club->delete();
        return [
            'result' => true,
        ];
    }
}
