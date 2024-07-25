<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @if (session('addReportSuccess'))
        <x-admin.alert>
            {{ session('addReportSuccess') }}
        </x-admin.alert>
    @endif
    <section>
        <div class="mx-auto max-w-2xl">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Buat Aduan</h2>
            <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Bencana/Insiden</label>
                        <select id="category" name="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="Banjir" selected>Banjir</option>
                            <option value="Tanah Longsor">Tanah Longsor</option>
                            <option value="Gempa Bumi">Gempa Bumi</option>
                            <option value="Yang Lain">Yang Lain</option>
                        </select>
                    </div>

                    <div class="sm:col-span-2" id="other-category-div" style="display:none">
                        <input type="text" name="other-category" id="other-category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Ketikkan Jenis Bencana/Insiden">
                    </div>
                    <script>
                        document.getElementById('category').addEventListener('change', function() {
                            var otherCategoryDiv = document.getElementById('other-category-div');
                            var inputOtherCategory = document.getElementById('other-category');
                            if (this.value === 'Yang Lain') {
                                otherCategoryDiv.style.display = 'block';
                                inputOtherCategory.required = true;
                            } else {
                                otherCategoryDiv.style.display = 'none';
                            }
                        });
                    </script>

                    <div class="sm:col-span-2">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                        <textarea id="description" name="description" rows="8"
                            class="@error('description')
                        bg-gray-50 border border-pink-500 text-pink-600 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 
                    @else
                        bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @enderror"
                            placeholder="Tambahkan penjelasan singkat mengenai kejadian atau potensi bencana">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-2 peer-invalid:visible text-pink-600 text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="location"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi</label>
                        <input type="text" name="location" id="location"
                            class="@error('location')
                        bg-gray-50 border border-pink-500 text-pink-600 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 
                    @else
                        bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @enderror"
                            placeholder="Alamat lokasi kejadian" value="{{ old('location') }}">
                        @error('location')
                            <p class="mt-2 peer-invalid:visible text-pink-600 text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto
                            Situasi</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            name="photo" aria-describedby="file_input_help" id="file_input" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or
                            GIF (MAX. 800x400px).</p>
                        @error('photo')
                            <p class="mt-2 peer-invalid:visible text-pink-600 text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Kirim
                </button>
            </form>
        </div>
    </section>
</x-layout>
