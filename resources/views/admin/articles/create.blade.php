<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5 shadow-md sm:rounded-lg">
        <div class="py-8 mx-auto max-w-2xl ">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah artikel baru</h2>
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                            Artikel</label>
                        <input type="text" name="title" id="title"
                            class="
                            @error('title')
                        bg-gray-50 border border-pink-500 text-pink-600 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 
                    @else
                        bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @enderror"
                            placeholder="Ketik judul artikel" value="{{ old('title') }}">
                        @error('title')
                            <p class="mt-2 peer-invalid:visible text-pink-600 text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isi
                            Artikel</label>
                        <textarea id="body" name="body" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Ketik isi artikel">{{ old('body') }}</textarea>
                        @error('body')
                            <p class="mt-2 peer-invalid:visible text-pink-600 text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="thumbnail">Upload file</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="thumbnail_help" id="thumbnail" name="thumbnail" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="thumbnail_help">SVG, PNG, JPG or
                            GIF (MAX. 800x400px).</p>
                        @error('thumbnail')
                            <p class="mt-2 peer-invalid:visible text-pink-600 text-sm">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>
                    <style>
                        .ck-editor__editable {
                            height: 200px;
                        }
                    </style>

                    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
                    <script>
                        ClassicEditor
                            .create(document.querySelector('#body'))
                            .catch(error => {
                                console.error(error);
                            });
                    </script>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Tambah artikel
                </button>
            </form>
        </div>
    </section>
</x-admin.layout>
