@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Club(home)</th>
                    <th>Club(guest)</th>
                </tr>
                @foreach($games as $game)
                    <tr>
                        <td><a href=" {{route('games.show', $game)}} ">{{$game->name}}</a>
                            <a href="{{route('pdf_export_games', $game)}}">
                                <i class="fa-sharp fa-solid fa-download"></i>
                            </a>
                        </td>
                        @foreach($game->clubs as $club)
                            <td> {{$club->name}} </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
            <div class="href_pages">
                <a href="{{route('admin.sponsors.index')}}">Спонсоры</a>
                <a href="{{route('admin.clubs.index')}}">Клубы</a>
            </div>
            {{$games->withQueryString()->links('pagination::bootstrap-5')}}
        </div>
    </div>

@endsection
