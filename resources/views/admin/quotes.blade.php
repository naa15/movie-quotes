@extends('layout')

@section('content')

    <x-dashboard>
        <x-quotes-list :quotes="$quotes"/>
    </x-dashboard>

@endsection
