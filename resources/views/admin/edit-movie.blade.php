@extends('layout')

@section('content')

    <x-dashboard>

        <h1 class="font-semibold">Edit Movie</h1>

        <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST" class="mb-6">
            @csrf
            @method('PATCH')

            <x-input name="english_title" value="{{ old('english_title', $movie->getTranslation('title', 'en')) }}" />
            <x-input name="georgian_title" value="{{ old('georgian_title', $movie->getTranslation('title', 'ka')) }}" />
            <x-input name="slug" value="{{ old('slug', $movie->slug) }}" />

            <x-button>Update</x-button>
        </form>

        <h1 class="font-semibold mb-6">Quotes from "{{ $movie->title }}"</h1>
        <x-quotes-list :quotes="$movie->quotes" />

    </x-dashboard>

@endsection
