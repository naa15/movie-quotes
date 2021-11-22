@extends('layout')

@section('content')

    <x-dashboard>

        <h1 class="font-semibold">Create New Movie:</h1>

        <form action="/admin/movies" method="POST">
            @csrf
            <x-input name="english_title" />
            <x-input name="georgian_title" />
            <x-input name="slug" />
            <x-button>
                Submit
            </x-button>
        </form>


    </x-dashboard>

@endsection
