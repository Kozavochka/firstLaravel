@extends('layouts.admin')
@section('content')
    <form method="post" action="{{ route('admin.sponsors.store') }}" >
        @csrf
        @include('admin.sponsors.form')
    </form>
@endsection
