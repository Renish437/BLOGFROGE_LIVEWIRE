@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg font-medium dark:text-gray-50 dark:bg-gray-700 text-gray-900">
            {{ $title }}
        </div>

        <div class="mt-4 text-sm dark:text-gray-50 dark:bg-gray-700 text-gray-600">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end px-6 py-4 dark:text-gray-50 dark:bg-gray-700 bg-gray-100 text-end">
        {{ $footer }}
    </div>
</x-modal>
