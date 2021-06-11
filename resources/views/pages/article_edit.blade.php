@guest
<x-guest-layout>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    U heeft geen toestemming om een artikel te schrijven!
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
              <form method='POST' action="/articles">
                  @csrf

                <div class="flex p-1">
                    <button type="submit" role="submit" class="p-3 rounded bg-purple-500 text-white hover:bg-purple-600" required>Bewerk</button>
                </form>

                </div>
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
