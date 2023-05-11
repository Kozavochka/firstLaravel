@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">
        <table>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Photo</th>
            </tr>
            @foreach($sponsors as $sponsor)
                <tr>
                    <td> {{$sponsor->name}}</td>
                    <td> {{$sponsor->type}}</td>
                    <td><img  src="{{$sponsor->photo_url}}" alt="Photo" class="sponsor_img"></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection
