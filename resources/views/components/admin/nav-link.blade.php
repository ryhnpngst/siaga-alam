<a {{ $attributes }}
    class="{{ $active ? 'text-gray-900 bg-gray-400' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }} group flex items-center p-2 text-base font-medium rounded-lg">
    {{ $slot }}
</a>
