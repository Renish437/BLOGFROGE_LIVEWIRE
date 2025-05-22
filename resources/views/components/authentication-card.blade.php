<div class="min-h-screen flex flex-col mx-auto sm:justify-center items-center pt-6 sm:pt-0 ">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white dark:text-gray-50 dark:bg-gray-700 shadow-xl overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
