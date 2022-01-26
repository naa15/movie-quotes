@extends('layout')

@section('content')
    
    <div class="flex h-screen">
        {{-- language buttons --}}
    
        <div class="space-y-2 m-auto flex-shrink-0 mr-16 ml-16">
            @if (app()->currentLocale() == 'ka')
                <a href="{{ route('movie.list', ['pathlang' => 'en', 'movie' => $movie->slug]) }}" class="relative flex">
                    <img class="" src="/images/circle2.png" alt="">
                    <h4 class="text-2xl absolute inset-1/4 text-white">en</h4>
                </a>                
            @else             
                <a href="{{ route('movie.list', ['pathlang' => 'ka', 'movie' => $movie->slug]) }}" class="relative flex">
                    <img class="" src="/images/circle.png" alt="">
                    <h4 class="text-2xl absolute inset-1/4">ka<h4>
                </a>
            @endif
        </div>
    
        <div class="text-center flex-1">
            <h1 class="text-5xl mt-24 text-white mb-14">
                {{ ucwords($movie->title) }}
            </h1>
    
            <div class="flex flex-col">
                @foreach ($quotes as $quote)
                    <div class="flex flex-col items-center mb-14">
                        <img src="{{ $quote->thumbnail ? asset('storage/' . $quote->thumbnail) : '/images/image.png' }}"
                            class="m-auto rounded-b-none" alt="" width="768">
                        <h1 class="bg-white leading-normal px-20 py-10 text-5xl text-black rounded-b-xl max-w-screen-md" style="width:768px">
                            "{{ $quote->body }}"
                        </h1>
                    </div>
                @endforeach
            </div>
    
        </div>
    </div>
@endsection
