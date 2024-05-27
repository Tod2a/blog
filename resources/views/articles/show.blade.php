<x-guest-layout>
    <h1 class="font-bold text-xl mb-4 capitalize">{{ $article->title }}</h1>

    <div class="mb-4 text-xs text-gray-500">
        {{ $article->published_at->diffForHumans() }}
    </div>

    <div class="flex items-center justify-center">
        <img src="{{ asset('storage/' . $article->img_path) }}" alt="illustration de l'article"
            class="rounded shadow aspect-auto object-cover object-center" />
    </div>

    <div class="mt-4">{!! \nl2br($article->body) !!}</div>

    <div class="flex mt-8">
        <x-avatar class="h-20 w-20" :user="$article->user" />
        <div class="ml-4 flex flex-col justify-center">
            <div class="text-gray-700">{{ $article->user->name }}</div>
            <div class="text-gray-500">{{ $article->user->email }}</div>
        </div>
    </div>

    <div class="mt-8 flex items-center justify-center">
        <a href="{{ route('front.articles.index') }}" class="font-bold bg-white text-gray-700 px-4 py-2 rounded shadow">
            Retour à la liste des articles
        </a>
    </div>

    <div class="mt-8">
        <h2 class="font-bold text-xl mb-4">Commentaires</h2>

        <div class="flex-col space-y-4">
            @forelse ($article->comments as $comment)
                <div class="flex bg-white rounded-md shadow p-4 space-x-4">
                    <div class="flex justify-start items-start h-full">
                        <x-avatar class="h-10 w-10" :user="$comment->user" />
                    </div>
                    <div class="flex flex-col justify-center w-full space-y-4">
                        <div class="flex justify-between">
                            <div class="flex space-x-4 items-center justify-center">
                                <div class="flex flex-col justify-center">
                                    <div class="text-gray-700">{{ $comment->user->name }}</div>
                                    <div class="text-gray-500 text-sm">
                                        {{ $comment->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                @can('delete', $comment)
                                    <button x-data="{ id: {{ $comment->id }} }"
                                        x-on:click.prevent="window.selected = id; $dispatch('open-modal', 'confirm-comment-deletion');"
                                        type="submit" class="font-bold bg-white text-gray-700 px-4 py-2 rounded shadow">
                                        <x-heroicon-o-trash class="h-5 w-5" />
                                    </button>
                                @endcan
                            </div>
                        </div>
                        <div class="flex flex-col justify-center w-full text-gray-700">
                            <p class="border bg-gray-100 rounded-md p-4">
                                {{ $comment->body }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="flex bg-white rounded-md shadow p-4 space-x-4">
                    Aucun commentaire pour l'instant
                </div>
            @endforelse @auth
            <form action="{{ route('front.articles.comments.add', $article) }}" method="POST"
                class="flex bg-white rounded-md shadow p-4">
                @csrf
                <div class="flex justify-start items-start h-full mr-4">
                    <x-avatar class="h-10 w-10" :user="auth()->user()" />
                </div>
                <div class="flex flex-col justify-center w-full">
                    <div class="text-gray-700">{{ auth()->user()->name }}</div>
                    <div class="text-gray-500 text-sm">{{ auth()->user()->email }}</div>
                    <div class="text-gray-700">
                        <textarea name="body" id="body" rows="4" placeholder="Votre commentaire"
                            class="w-full rounded-md shadow-sm border-gray-300 bg-gray-100 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-4"></textarea>
                    </div>
                    <div class="text-gray-700 mt-2 flex justify-end">
                        <button type="submit" class="font-bold bg-white text-gray-700 px-4 py-2 rounded shadow">
                            Ajouter un commentaire
                        </button>
                    </div>
                </div>
            </form>
        @else
            <div class="flex bg-white rounded-md shadow p-4 text-gray-700 justify-between items-center">
                <span> Vous devez être connecté pour ajouter un commentaire </span>
                <a href="{{ route('login') }}" class="font-bold bg-white text-gray-700 px-4 py-2 rounded shadow-md">Se
                    connecter</a>
            </div>
        @endauth
    </div>
    <x-modal name="confirm-comment-deletion" focusable>
        <form method="post"
            onsubmit="event.target.action= '/articles/{{ $article->id }}/comments/' + window.selected"
            class="p-6">
            @csrf @method('DELETE')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Êtes-vous sûr de vouloir supprimer ce commentaire ?
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Cette action est irréversible. Toutes les données seront supprimées.
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Annuler
                </x-secondary-button>

                <x-danger-button class="ml-3" type="submit">
                    Supprimer
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</div>
</x-guest-layout>
