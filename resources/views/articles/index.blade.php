<x-guest-layout>
    <h1 class="font-bold text-xl mb-4">Liste des articles</h1>

    <form action="{{ route('front.articles.index') }}" method="GET" class="mb-4">
        <div class="flex items-center">
            <input
                type="text"
                name="search"
                id="search"
                placeholder="Rechercher un article"
                class="flex-grow border border-gray-300 rounded shadow px-4 py-2 mr-4"
                value="{{ request()->search }}"
                autofocus
            />

            <button type="submit" class="bg-white text-gray-600 px-4 py-2 rounded-lg shadow">
                <x-heroicon-o-magnifying-glass class="h-5 w-5" />
            </button>
        </div>
    </form> 


    <ul class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8">
        @foreach ($articles as $article)
            <li>
                <x-article-card :article="$article" />
            </li>
        @endforeach
    </ul>

    <div class="mt-8">
        {{ $articles->links() }}
    </div>
</x-guest-layout>
