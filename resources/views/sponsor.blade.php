@extends('layouts.app')
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
                    <td><a style="color: white"
                            href="{{route('sponsors.show', $sponsor)}}">{{$sponsor->name}}</a></td>
                    <td> {{$sponsor->type}}</td>
                    <td> {{$sponsor->clubs_count}}</td> {{--так как было подгружено только кол-во клубов, то используется так--}}
                    <td><img  src="{{$sponsor->photo_url}}" alt="Photo" class="sponsor_img"></td>
                </tr>
            @endforeach
        </table>
        <div class="href_pages">
            <a href="{{route('clubs.index')}}">Клубы</a>
            <a href="{{route('login')}}">Home</a>
        </div>
    </div>
</div>

@endsection
