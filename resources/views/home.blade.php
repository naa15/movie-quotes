@extends('layout')

@section('content')

    <div class="flex items-center h-screen">
        {{-- language buttons --}}
        <div class="space-y-2">
            <a href="#" class="relative flex">
                <img class="" src="/images/circle2.png" alt="">
                <h4 class="text-2xl absolute inset-1/4 text-white">en</h4>
            </a>

            <a href="#" class="relative flex">
                <img class="" src="/images/circle.png" alt="">
                <h4 class="text-2xl absolute inset-1/4">ka<h4>
            </a>
        </div>


        {{-- image title and quote --}}
        <div class="text-center flex-1 w-16">
            <img src="/images/image.png" class="m-auto rounded-xl" alt="The Father of Soldier">
            <h1 class="text-5xl mt-16 text-white">
                "{{ $quote->body }}"
            </h1>
    
    
            <h1 class="text-5xl mt-24 text-white underline">
                <a href="/movies/{{ $quote->movie->slug }}">{{ ucwords($quote->movie->title) }}</a>
            </h1>
        </div>


    </div>
   
@endsection
