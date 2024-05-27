<a class="flex flex-col h-full space-y-4 bg-white rounded-md shadow-md p-5 w-full hover:shadow-lg hover:scale-105 transition"
    href="{{ route('front.articles.show', $article) }}">
    <img src="{{ asset('storage/' . $article->img_path) }}" alt="illustration de l'article" />
    <div class="uppercase font-bold text-gray-800">{{ $article->title }}</div>
    <div class="flex-grow text-gray-700 text-sm text-justify">
        {{ Str::limit($article->body, 120) }}
    </div>
    <div class="flex justify-between items-center">
        <div class="text-sm text-gray-500">
            {{ $article->published_at->diffForHumans() }}
        </div>
        <div class="flex items-center space-x-2">
            <x-heroicon-o-chat-bubble-bottom-center-text class="h-5 w-5 text-gray-500" />
            <div class="text-sm text-gray-500">{{ $article->comments_count }}</div>
        </div>
    </div>
</a>
