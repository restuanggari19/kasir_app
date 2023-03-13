@extends('layouts.main', ['title' => 'Dashboard'])
@section('content')
    @can('admin')
        @include('home.admin')
    @elsecan('manajer')
        @include('home.manajer')
    @else
        @include('home.kasir')
    @endcan
@endsection
