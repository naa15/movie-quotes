@extends('layout')

@section('content')

    <div class="flex h-screen">
        {{-- language buttons --}}
        @if ($quote)
            <div class="space-y-2 m-auto flex-shrink-0 mr-16 ml-16">
                <a href="{{ route('quote', ['pathlang' => 'en', 'quote' => $quote->id]) }}" class="relative flex">
                    <img class="" src="/images/circle2.png" alt="">
                    <h4 class="text-2xl absolute inset-1/4 text-white">en</h4>
                </a>

                <a href="{{ route('quote', ['pathlang' => 'ka', 'quote' => $quote->id]) }}" class="relative flex">
                    <img class="" src="/images/circle.png" alt="">
                    <h4 class="text-2xl absolute inset-1/4">ka<h4>
                </a>
            </div>
        @endif



        {{-- image title and quote --}}
        @if ($quote)
            <div class="text-center flex-1 mt-56">
                <div>
                    <img src="{{ $quote->thumbnail ? asset('storage/' . $quote->thumbnail) : '/images/image.png' }}"
                        class="m-auto rounded-xl" width="700" alt="">
                    {{-- <img src="/images/image.png" class="m-auto rounded-xl" alt="The Father of Soldier"> --}}
                    <h1 class="text-5xl mt-16 text-white">
                        "{{ $quote->body }}"
                    </h1>
                </div>
                <h1 class="text-5xl mt-24 text-white underline">
                    <a
                        href="{{ route('movie.list', ['pathlang' => app()->currentLocale(), 'movie' => $quote->movie->slug]) }}">{{ ucwords($quote->movie->title) }}</a>
                </h1>
            </div>
        @else
            <div class="flex-1 text-center items-center">
                <h1 class="text-5xl">No quotes yet</h1>
            </div>
        @endif


    </div>

@endsection
