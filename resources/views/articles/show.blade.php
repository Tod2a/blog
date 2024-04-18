<x-guest-layout>
    <h1 class="font-bold text-xl mb-4">{{ $article->title }}</h1>
    <div class="mb-4 text-xs text-gray-500">
        {{ $article->published_at }}
    </div>
    <div>
        {!! \nl2br($article->body) !!}
    </div>
    <div>
        <img src="{{ Storage::url($article->img_path) }}" alt="Lien de l'image">
    </div>
</x-guest-layout>
