<x-guest-layout>
    <h1 class="font-bold text-xl mb-4">Liste des articles</h1>
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
