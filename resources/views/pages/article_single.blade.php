<x-app-layout>

    <!--Container-->
<div class="container w-full max-w-7xl mx-auto pt-10">

	<div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">

		<!--Title-->
		<div class="font-sans">
			<p class="text-base md:text-sm text-purple-500 font-bold">&lt; <a href="{{ url('articles') }}" class="text-base md:text-sm text-purple-500 font-bold no-underline hover:underline">BACK TO ARTICLES</a></p>
			<h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">{{ $post->naam }}</h1>
			<p class="text-sm md:text-base font-normal text-gray-600">{{ $post->updated_at }}</p>
		</div>

		<!--Post Image-->
        <img class="w-full py-6" src="/images/{{ $post->artikels_photo_path }}" alt="IMAGE CAN NOT BE RETRIEVED"/>


		<!--/ Post Content-->
		<div class="pb-6 text-justify">{!! $post->inhoud !!}</div>

		<!--Blog Creator-->
        <div class="BottonArticle flex w-full justify-between">
		    <p class="text-base md:text-lg font-normal text-gray-600">{{ $post->user->name }}</p>
        </div>

	</div>
</div>

</x-app-layout>
