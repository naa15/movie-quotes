@extends('layout')

@section('content')

    <x-dashboard>

        <h1 class="font-semibold">Create New Quote:</h1>

        <form action="/admin/quotes" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <x-label name="movie" />
                <select name="movie_id" id="movie_id">
                    @foreach ($movies as $movie)
                        <option value="{{ $movie->id }}" {{ old('movie_id') == $movie->id ? 'selected' : '' }}>
                            {{ ucwords($movie->title) }}</option>
                    @endforeach
                </select>
                <x-error name="movie" />
            </div>

            <x-textarea name="english_body">{{ old('english_body') }}</x-textarea>
            <x-textarea name="georgian_body">{{ old('georgian_body') }}</x-textarea>
            <x-input name="thumbnail" type="file" />
            <x-button>Submit</x-button>
        </form>


    </x-dashboard>

@endsection
