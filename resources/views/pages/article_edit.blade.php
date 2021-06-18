@guest
<x-guest-layout>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    U heeft geen toestemming om een artikel te bewerken!
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
@endguest

@auth
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <p class="text-base md:text-sm text-purple-500 font-bold pb-8">&lt; <a href="{{ url('articles') }}" class="text-base md:text-sm text-purple-500 font-bold no-underline hover:underline">BACK TO ARTICLES</a></p>
          <div class="bg-white overflow-hidden border-t border-b filter drop-shadow-xl sm:rounded-lg">
            <div class="p-6 bg-white border-gray-200">

                <form method='POST' action="/article/{{ $post->id }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="mb-4">
                  <label class="text-xl text-gray-600">Titel</label></br>
                  <input type="text" class="border-2 border-gray-300 p-2 w-full" name="ArticleTitle" id="ArticleTitle" required value="{{$post->naam}}">
                </div>

                <div class="mb-4">
                    <label class="text-xl text-gray-600">Slug</label></br>
                    <input type="text" class="border-2 border-gray-300 p-2 w-full" name="ArticleSlug" id="ArticleSlug" required value="{{$post->slug}}">
                  </div>

                <div class="mb-4">
                    <label class="text-xl text-gray-600">Image</label></br>
                    <input class="border-2 border-gray-300 p-2 w-full form-control" type="file" name="images">
                </div>


                <div class="mb-8">
                  <label class="text-xl text-gray-600">Content</label></br>
                  <textarea name="ArticleContent" id="ArticleContent" class="border-2 border-gray-500">{{$post->inhoud}}</textarea>
                </div>

                <div class="flex p-1">
                    <button type="submit" role="submit" class="p-3 rounded bg-purple-500 text-white hover:bg-purple-600" required>Bewerk</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

      <script>
        CKEDITOR.replace('ArticleContent');
      </script>

</x-app-layout>
@endauth
