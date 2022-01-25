
<section class="py-36 max-w-6xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        Manage Movies and Quotes
    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <ul>
                <li>
                    <a href="{{ route('admin.movies') }}" class="{{ request()->is('admin/movies') ? 'text-white' : '' }}">All Movies</a>
                </li>

                <li>
                    <a href="{{ route('admin.quotes') }}" class="{{ request()->is('admin/quotes') ? 'text-white' : '' }}">All Quotes</a>
                </li>

                <li>
                    <a href="{{ route('admin.movies.create') }}" class="{{ request()->is('admin/movies/create') ? 'text-white' : '' }}">New Movie</a>
                </li>

                <li>
                    <a href="{{ route('admin.quotes.create') }}" class="{{ request()->is('admin/quotes/create') ? 'text-white' : '' }}">New Quote</a>
                </li>

            </ul>
        </aside>
        <main class="flex-1">
            {{ $slot }}
        </main>
    </div>
</section>


