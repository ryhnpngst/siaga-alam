<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/admin/reports" class="font-medium text-xs text-blue-600 flex items-center hover:underline">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14M5 12l4-4m-4 4 4 4" />
                        </svg>
                        <span class="ml-2">Kembali ke semua aduan</span>
                    </a>
                    <address class="flex items-center my-6 mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <div
                                class="relative inline-flex items-center justify-center mr-4 w-16 h-16 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <span
                                    class="font-medium text-2xl text-gray-600 dark:text-gray-300">{{ $report->author->initials }}</span>
                            </div>
                            <div>
                                <p rel="author" class="text-xl font-bold text-gray-900 dark:text-white">
                                    Dilaporkan oleh {{ $report->author->name }}</p>
                                <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate
                                        datetime="{{ $report->created_at->toW3cString() }}"
                                        title="{{ $report->created_at->toFormattedDateString() }}">
                                        Dikirim pada
                                        {{ $report->created_at->translatedFormat('l, d F Y \p\u\k\u\l H:i') }}
                                    </time>
                                </p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $report['category'] }} di {{ $report['location'] }}</h1>
                </header>
                @if ($report['photo'])
                    <figure>
                        <img class="h-auto max-w-xl mx-auto rounded-lg"
                            src="{{ asset('storage/photos/' . $report['photo']) }}" alt="">
                    </figure>
                @endif

                <p>{{ $report['description'] }}</p>
            </article>
        </div>
    </main>
</x-admin.layout>
