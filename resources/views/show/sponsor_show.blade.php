@extends('layouts.app')
@section('content')
<h1>Спонсор {{$sponsor->name}}</h1>
<p>Деятельность: {{$sponsor->type}}, местоположение: {{$sponsor->location}}</p>
<h2>Спонсируемые клубы</h2>
<ul class="list-group">

    @foreach($sponsor->clubs as $club)
        <li class="list-group-item">{{$club->name}}</li>
    @endforeach

</ul>

@can('view', auth()->user())
    <a class="btn btn-success" href="{{route('admin.sponsors.edit', $sponsor)}}">
        Редактировать
    </a>
@endcan

@endsection
