<x-layout>
    <x-slot:title>{{ $article['title'] }}</x-slot:title>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/articles" class='font-medium text-xs text-blue-600 hover:underline'>&laquo;Kembali ke semua
                        artikel</a>
                    <address class="flex items-center my-6 mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                            <div>
                                <a href="/articles?author={{ $article->author->username }}" rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white">{{ $article->author->name }}</a>
                                <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate
                                        datetime="2022-02-08"
                                        title="February 8th, 2022">{{ $article->created_at->diffForHumans() }}</time>
                                </p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $article['title'] }}</h1>
                </header>
                <p>{{ $article['body'] }}</p>
            </article>
        </div>
    </main>
</x-layout>
