@extends('layouts.admin')
@section('content')
    <h1>Спонсоры и их клубы</h1>
    @foreach($sponsors as $sponsor => $clubs)

        {{$sponsor}}
        <ul>
            @foreach($clubs as $club)
                <li>{{$club->name}}</li>
            @endforeach
        </ul>
    @endforeach

@endsection
