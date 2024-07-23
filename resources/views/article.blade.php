<x-layout>
    <x-slot:title>{{ $article['title'] }}</x-slot:title>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/articles" class="font-medium text-xs text-blue-600 flex items-center hover:underline">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14M5 12l4-4m-4 4 4 4" />
                        </svg>
                        <span class="ml-2">Kembali ke semua artikel</span>
                    </a>
                    <address class="flex items-center my-6 mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <div
                                class="relative inline-flex items-center justify-center mr-4 w-16 h-16 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <span
                                    class="font-medium text-2xl text-gray-600 dark:text-gray-300">{{ $article->author->initials }}</span>
                            </div>
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
