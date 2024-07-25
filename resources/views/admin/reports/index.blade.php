<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl">
            @if (session()->has('addReportSuccess'))
                <x-admin.alert>
                    {{ session('addReportSuccess') }}
                </x-admin.alert>
            @endif
            @if (session()->has('editReportSuccess'))
                <x-admin.alert>
                    {{ session('editReportSuccess') }}
                </x-admin.alert>
            @endif
            @if (session()->has('deleteReportSuccess'))
                <x-admin.alert>
                    {{ session('deleteReportSuccess') }}
                </x-admin.alert>
            @endif
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="search" name="search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Cari Aduan">
                            </div>
                        </form>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="#" type="button"
                            class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Tambah aduan
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Bencana/Insiden</th>
                                <th scope="col" class="px-4 py-3">Pelapor</th>
                                <th scope="col" class="px-4 py-3">Lokasi</th>
                                <th scope="col" class="px-4 py-3">Deskripsi</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $report['category'] }}</th>
                                    <td class="px-4 py-3">{{ $report->author->name }}</td>
                                    <td class="px-4 py-3">{{ $report['location'] }}</td>
                                    <td class="px-4 py-3">{{ $report['description'] }}</td>
                                    <td class="px-4 py-3">
                                        @if ($report['status'] === 'accepted')
                                            <span
                                                class="bg-green-200 text-green-900 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-800">
                                                Diterima
                                            </span>
                                        @elseif ($report['status'] === 'in verification')
                                            <span
                                                class="bg-yellow-200 text-yellow-900 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-800">
                                                Dalam Verifikasi
                                            </span>
                                        @elseif ($report['status'] === 'valid')
                                            <span
                                                class="bg-blue-200 text-blue-900 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
                                                Valid
                                            </span>
                                        @elseif ($report['status'] === 'in valid')
                                            <span
                                                class="bg-red-200 text-red-900 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-800">
                                                Tidak Valid
                                            </span>
                                        @elseif($report['status'] === 'in progress')
                                            <span
                                                class="bg-yellow-200 text-yellow-900 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-800">
                                                Sedang Diproses
                                            </span>
                                        @elseif($report['status'] === 'finished')
                                            <span
                                                class="bg-green-200 text-green-900 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-800">
                                                Selesai
                                            </span>
                                        @endif
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button id="apple-imac-27-dropdown-button"
                                            data-dropdown-toggle="{{ $report['id'] }}"
                                            class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                            type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                        <div id="{{ $report['id'] }}"
                                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="apple-imac-27-dropdown-button">
                                                <li>
                                                    <a href="{{ route('reports.show', $report->id) }}"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Lihat</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('reports.edit', $report->id) }}"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                </li>
                                            </ul>
                                            <div class="py-1">
                                                <form class="delete-form"
                                                    action="{{ route('reports.destroy', $report->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="delete-button block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $reports->links() }}
            </div>
        </div>
    </section>
    <script>
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah aksi default dari tombol submit

                // Menemukan form yang sesuai
                const form = this.closest('form');

                Swal.fire({
                    title: "Yakin ingin menghapus artikel ini?",
                    text: "Kamu tidak akan bisa mengembalikan data yang telah dihapus!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Tidak, batalkan!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika dikonfirmasi, submit form secara manual
                        form.submit();
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire("Dibatalkan", "Artikel kamu aman :)", "error");
                    }
                });
            });
        });
    </script>
</x-admin.layout>
