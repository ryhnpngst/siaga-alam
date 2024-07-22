<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section>
        <div class="py-8 mx-auto max-w-screen-xl lg:py-16">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Berita
                    Terbaru</h2>
                {{-- <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">We use an agile approach to test
                        assumptions and connect with the needs of your audience early and often.</p> --}}
            </div>
            <x-search></x-search>
            {{ $articles->links() }}
            <div class="my-8 grid gap-8 lg:grid-cols-2">
                @forelse ($articles as $article)
                    <article
                        class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between items-center mb-5 text-gray-500">
                            {{-- <span
                                class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                                    </path>
                                </svg>
                                Tutorial
                            </span> --}}
                            <span class="text-sm">{{ $article->created_at->diffForHumans() }}</span>
                        </div>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white hover:underline">
                            <a href="/articles/{{ $article['slug'] }}">{{ $article['title'] }}</a>
                        </h2>
                        <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ $article['body'] }}</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-4">
                                <img class="w-7 h-7 rounded-full"
                                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                    alt="Jese Leos avatar" />
                                <span class="font-medium dark:text-white hover:underline">
                                    <a href="/articles?author={{ $article->author->username }}">
                                        {{ $article->author->name }}
                                    </a>
                                </span>
                            </div>
                            <a href="/articles/{{ $article['slug'] }}"
                                class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                Baca selengkapnya
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                @empty
            </div>
            <section>
                <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
                    <figure class="max-w-screen-md mx-auto">
                        <svg class="h-12 mx-auto mb-3 text-gray-400 dark:text-gray-600" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 27">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <p class="text-2xl font-medium text-gray-900 dark:text-white">Tidak ada hasil berdasarkan
                            pencarian anda.</p>
                        <figcaption class="flex items-center justify-center mt-6 space-x-3">
                            <div class="flex items-center divide-x-2 divide-gray-500 dark:divide-gray-700">

                                <div class="pl-3 text-sm font-light text-gray-500 dark:text-gray-400">
                                    <a href="/articles" class="flex items-center hover:underline">
                                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                                        </svg>
                                        <span class="ml-2">Kembali ke semua artikel</span>
                                    </a>

                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </section>
            @endforelse
        </div>
    </section>
    {{ $articles->links() }}
</x-layout>
