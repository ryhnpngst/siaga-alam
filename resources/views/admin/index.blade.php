<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-4 mt-4">
        <div class="bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-900">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Total aduan
                        diterima</dt>
                    <dd class="mt-1 text-3xl leading-9 font-semibold text-primary-600 dark:text-indigo-400">
                        {{ $reportsCount }}</dd>
                </dl>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-900">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Total konten
                        artikel</dt>
                    <dd class="mt-1 text-3xl leading-9 font-semibold text-primary-600 dark:text-indigo-400">
                        {{ $articlesCount }}</dd>
                    </dd>
                </dl>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-900">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Total konten
                        informasi</dt>
                    <dd class="mt-1 text-3xl leading-9 font-semibold text-primary-600 dark:text-indigo-400">
                        {{ $educationsCount }}</dd>
                </dl>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-900">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Total pengguna
                    </dt>
                    <dd class="mt-1 text-3xl leading-9 font-semibold text-primary-600 dark:text-indigo-400">
                        {{ $usersCount }}
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    </div>
</x-admin.layout>
