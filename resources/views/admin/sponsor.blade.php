@extends('layouts.admin')
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
                        <td> {{$sponsor->clubs_count}}</td>
                        <td><img  src="{{$sponsor->photo_url}}" alt="Photo" class="sponsor_img"></td>
                    </tr>
                @endforeach
            </table>
           {{-- <div class="href_pages">
                <a href="{{route('admin-clubs.index')}}">Клубы</a>
                <a href="{{ url()->current() }}?filter[desc_order]=true"> Фильтр по числу клубов</a>
                <a href="{{ url()->current() }}?{{ http_build_query(request()->except('filter')) }}">Сбросить фильтр</a>
            </div>--}}
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('admin-clubs.index')}}">Клубы</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url()->current() }}?{{ http_build_query(request()->except('filter')) }}">Сбросить фильтр</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url()->current() }}?filter[desc_order]=true">Фильтр clubs count</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
            {{$sponsors->withQueryString()->links('pagination::bootstrap-5')}}
        </div>
    </div>

@endsection
