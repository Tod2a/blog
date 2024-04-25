<a class="flex flex-col h-full space-y-4 bg-white rounded-md shadow-md p-5 w-full hover:shadow-lg hover:scale-105 transition"
    href="{{ route('front.articles.show', $article) }}">
    <div class="uppercase font-bold text-gray-800">
        {{ $article->title }}
    </div>
    <div class="flex-grow text-gray-700 text-sm text-justify">
        {{ Str::limit($article->body, 120) }}
    </div>
    <div class="text-xs text-gray-500">
        {{ $article->published_at }}
    </div>
    <div>
        <img src="{{ Storage::url($article->img_path) }}" alt="illustration de l'article">
    </div>
</a>
