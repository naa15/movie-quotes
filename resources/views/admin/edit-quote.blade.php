@extends('layout')

@section('content')

    <x-dashboard>

        <h1 class="font-semibold">Edit Quote From: "{{ $quote->movie->title }}"</h1>

        <form action="/admin/quotes/{{ $quote->id }}" method="POST" class="mb-6" enctype="multipart/form-data">
            @csrf
            @method('PATCH')


            <div>
                <x-label name="movie" />
                <select name="movie_id" id="movie_id">
                    @foreach ($movies as $movie)
                        <option value="{{ $movie->id }}"
                            {{ old('movie_id', $quote->movie->id) == $movie->id ? 'selected' : '' }}>
                            {{ ucwords($movie->title) }}</option>
                    @endforeach
                </select>
                <x-error name="movie" />
            </div>

            <x-textarea name="english_body">{{ old('english_body', $quote->getTranslation('body', 'en')) }}</x-textarea>
            <x-textarea name="georgian_body">{{ old('georgian_body', $quote->getTranslation('body', 'ka')) }}</x-textarea>

            <x-input name="thumbnail" type="file" :value="old('thumbnail', $quote->thumbnail)" />

            @if ($quote->thumbnail)
                <img src="{{ asset('storage/' . $quote->thumbnail) }}" class="mr-3 rounded-xl mt-2" width="100" alt=""
                    class="rounded-xl">
            @endif


            <x-button>Update</x-button>
        </form>
    </x-dashboard>

@endsection
