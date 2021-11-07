@extends('layout')

@section('content')

    <x-dashboard>

        <h1 class="font-semibold">Edit Movie: "{{ $movie->title }}"</h1>

        <form action="/admin/movies/{{ $movie->id }}" method="POST" class="mb-6">
            @csrf
            @method('PATCH')

            <x-input name="title" value="{{ old('title', $movie->title) }}"/>
            <x-input name="slug" value="{{ old('slug', $movie->slug) }}"/>

            <x-button>Update</x-button>
        </form>

        <h1 class="font-semibold mb-6">Quotes from "{{ $movie->title }}"</h1>
        <x-quotes-list :quotes="$movie->quotes"/>

    </x-dashboard>

@endsection