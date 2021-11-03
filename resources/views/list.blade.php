@extends('layout')


<div class="flex h-screen">
    {{-- language buttons --}}
    <div class="space-y-2 m-auto flex-shrink-0 mr-16 ml-16">
        <a href="#" class="relative flex">
            <img class="" src="/images/circle2.png" alt="">
            <h4 class="text-2xl absolute inset-1/4 text-white">en</h4>
        </a>

        <a href="#" class="relative flex">
            <img class="" src="/images/circle.png" alt="">
            <h4 class="text-2xl absolute inset-1/4">ka<h4>
        </a>
    </div>

    <div class="text-center flex-1 mt-56">
        <h1 class="text-5xl mt-24 text-white underline mb-14">
            {{ ucwords($movie->title) }}
        </h1>

        @foreach ($quotes as $quote)
            <div class="mb-14 inline-grid">
                <img src="{{ $quote->thumbnail ? asset('storage/' . $quote->thumbnail) : '/images/image.png' }}"
                    class="m-auto rounded-xl" alt="">
                <h1 class="text-5xl mt-16 text-white max-w-5xl">
                    "{{ $quote->body }}"
                </h1>
            </div>
        @endforeach

    </div>
</div>
