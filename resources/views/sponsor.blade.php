@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">
        <table>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Clubs count</th>
                <th>Photo</th>
            </tr>
            @foreach($sponsors as $sponsor)
                <tr>
                    <td> {{$sponsor->name}}</td>
                    <td> {{$sponsor->type}}</td>
                    <td> {{$sponsor->clubs()->count()}}</td> {{--Обращение к количеству через relation, а не загрузки всех клубов--}}
                    <td><img  src="{{$sponsor->photo_url}}" alt="Photo" class="sponsor_img"></td>
                </tr>
            @endforeach
        </table>
        <div class="href_pages">
            <a href="{{route('clubs.index')}}">Клубы</a>
        </div>
    </div>
</div>

@endsection
