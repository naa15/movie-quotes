@extends('layout')

@section('content')

    <x-dashboard>

        <h1>Create New Movie:</h1>

        <form action="/admin/movies" method="POST">
            @csrf
            <x-input name="title"/>
            <x-input name="slug"/>
            <x-button>
                Submit
            </x-button>
        </form>


    </x-dashboard>

@endsection