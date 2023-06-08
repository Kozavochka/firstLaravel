<div class="form-group">
    <div class="mb-3">
        <label for="name" class="form-label">Имя</label>
        <input id="name" name="name"  class="form-control" type="text" placeholder="Введите название" >
    </div>
</div>
<div class="form-group">
    <label for="select_league" class="form-label">Лига</label>
    <select id="select_league" name="league_id" class="form-select" aria-label="Default select example">
        <option selected>Выберите лигу</option>
        @foreach($leagues as $lesgue)
            <option value="{{$lesgue->id}}">{{$lesgue->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="select_sponsor" class="form-label">Лига</label>
    <select id="select_sponsor" name="sponsor_id" class="form-select" aria-label="Default select example">
        <option selected>Выберите спонсора</option>
        @foreach($sponsors as $sponsor)
            <option value="{{$sponsor->id}}">{{$sponsor->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <div class="mb-3">
        <label for="players_count" class="form-label">Количество игроков</label>
        <input id="players_count"  name="players_count" class="form-control" type="number" placeholder="Количество игроков">
    </div>
</div>
<div class="form-group">
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Описание</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
    </div>
</div>

<button type="submit" class="btn btn-primary">Submit</button>


