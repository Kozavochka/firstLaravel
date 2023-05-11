@extends('layouts.main')
@section('content')

<div class="container">
    <table class="table_blur">
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Photo</th>
        </tr>
        @foreach($sponsors as $sponsor)
            <tr>
                <td> {{$sponsor->name}}</td>
                <td> {{$sponsor->type}}</td>
                <td><img src="{{$sponsor->photo_url}}" alt="Photo" loading="lazy" class="sponsor_img"></td>
            </tr>
        @endforeach
    </table>
</div>

@endsection
