@extends('layouts.admin')
@section('content')
    <form method="post" action="{{ route('admin.clubs.store') }}" >
        @csrf
        @include('admin.clubs.form')
    </form>
@endsection
