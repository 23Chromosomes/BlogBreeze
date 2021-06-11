<x-app-layout>

    <div class="flex flex-wrap justify-center">
    @foreach ($posts as $post)
        <div class="max-w-sm rounded overflow-hidden shadow-lg m-2" style="height: fit-content;">
            <a href="/article/{{ $post->slug }}">
                <img class="w-full" src="/images/{{ $post->artikels_photo_path }}" alt="IMAGE CAN NOT BE RETRIEVED"/>
            </a>
            <div class="px-6 py-4">
                <a href="/article/{{ $post->slug }}">
                    <div class="font-bold text-xl mb-2">{{ $post->naam }}</div>
                </a>
                <p class="text-grey-darker text-base">
                    {!!Str::limit( $post->inhoud, 200)!!}
                </p>
            </div>
            <div class="px-6 pb-2">
                <span class="font-bold text-sm mb-2">{{ $post->user_id }}</span>
            </div>

            @auth
            <div>
                <a class="rounded bg-purple-500 text-white hover:bg-purple-600 float-right p-2 m-2" href="/article/{{ $post->slug }}/edit">Bewerk Artikel</a>
                <button onclick="event.preventDefault();document.getElementById('delete-post-form').submit();"class="rounded bg-red-500 text-white hover:bg-red-600 float-left m-2 p-2">
                    Verwijderen
                </button>
            </div>

            <form id="delete-post-form" action="/articles/{{ $post->id }}" method="POST" style="display: none;">
                @csrf
                @method('delete');
            </form>
            @endauth

        </div>
    @endforeach
    </div>


</x-app-layout>
