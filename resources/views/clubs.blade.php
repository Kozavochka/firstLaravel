@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Sponsor</th>
                </tr>
                @foreach($clubs as $club)
                    <tr>
                        <td> {{$club->name}}</td>
                        <td> {{$club->sponsor?->name ?? 'Doesnt Have' }}</td>
                    </tr>
                @endforeach
            </table>
            <div class="href_pages">
                <a href="{{route('sponsors.index')}}">Спонсоры</a>
                <a href="{{ route('prepare-export') }}">Экспорт</a>
            </div>
            {{$clubs->withQueryString()->links('pagination::bootstrap-5')}}
        </div>
    </div>

@endsection
