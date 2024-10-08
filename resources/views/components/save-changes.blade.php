@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="flex items-center mb-2">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3 3h14v14H3V3z" fill="#4F46E5"/>
            </svg>
            <h3 class="text-sm font-semibold text-gray-800">
                {{ $title }}
            </h3>
        </div>

        <div class="mt-4 text-sm text-gray-600">
            {{ $content }}
        </div>
    </div>

    <div class="flex justify-end px-6 py-4 bg-gray-100">
        {{ $footer }}
    </div>
</x-modal>
