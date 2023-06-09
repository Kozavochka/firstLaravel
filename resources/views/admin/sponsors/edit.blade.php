@extends('layouts.admin')
@section('content')

    <form method="post" action="{{ route('admin.sponsors.update', $sponsor) }}" >
        @csrf
        @method('patch')
        <div class="form-group">
            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input id="name" name="name"  class="form-control" type="text" placeholder="Введите имя спонсора"
                       value="{{ old('name', $sponsor->name) }}" >
            </div>
        </div>
        <div class="form-group">
            <div class="mb-3">
                <label for="type" class="form-label">Тип</label>
                <input id="type"  name="type" class="form-control" type="text" placeholder="Введите тип спонсора"
                       value="{{ old('type', $sponsor->type) }}">
            </div>
        </div>
        <div class="form-group">
            <div class="mb-3">
                <label for="location" class="form-label">Локация</label>
                <input id="location"  name="location" class="form-control" type="text" placeholder="Введите местоположение спонсора"
                       value="{{ old('location', $sponsor->location) }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>



    </form>
@endsection
