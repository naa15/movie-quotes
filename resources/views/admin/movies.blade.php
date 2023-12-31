@extends('layout')

@section('content')

    <x-dashboard>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($movies as $movie)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="{{ route('movie.list', ['pathlang' => 'en', 'movie' => $movie->slug]) }}">{{ \Illuminate\Support\Str::limit(ucwords($movie->getTranslation('title', 'en')), 50, $end = '...') }}</a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="{{ route('movie.list', ['pathlang' => 'ka', 'movie' => $movie->slug]) }}">{{ \Illuminate\Support\Str::limit(ucwords($movie->getTranslation('title', 'ka')), 50, $end = '...') }}</a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('admin.movies.edit', $movie->id) }}"
                                                class="text-gray-600 hover:text-gray-900">Edit</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="POST" action="{{ route('admin.movies.delete', $movie->id) }}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="text-red-500 hover:text-red-700 text-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-dashboard>

@endsection
