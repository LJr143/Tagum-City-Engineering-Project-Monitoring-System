<div class="relative hidden md:block">
    <svg class="absolute top-[13px] left-4" width="18" height="18" viewBox="0 0 21 21" fill="none"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M9.625 16.625C13.491 16.625 16.625 13.491 16.625 9.625C16.625 5.75901 13.491 2.625 9.625 2.625C5.75901 2.625 2.625 5.75901 2.625 9.625C2.625 13.491 5.75901 16.625 9.625 16.625Z"
            stroke="#787C7F" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M18.3746 18.375L14.5684 14.5688" stroke="#787C7F" stroke-width="1.75" stroke-linecap="round"
              stroke-linejoin="round" />
    </svg>
    <div>
        <input wire:model.live.debounce.0ms="search" type="search" name="search" id="search"
               class="rounded-full px-12 py-2.5 placeholder:text-sm outline-none border-none z-10 bg-[#f7f7f9] hover:ring-[#626465] focus:ring-[#626465]"
               placeholder="Search Anything">
        @if(!empty($results))
            <div class="absolute z-10 w-full mt-2 bg-white divide-y rounded-lg shadow-md">
                @foreach($results as $categoryId => $categoryName)
                    <div wire:click="selectResult('{{ $categoryName }}', '{{ $categoryId }}')" @if (request()->routeIs('client.step')){ @click.prevent="preventAction = true" }@endif
                    class="cursor-pointer px-3 py-2 border-b border-gray-200 hover:bg-gray-100">
                        <div class="flex flex-col ml-3">
                            <span class="font-medium text-gray-800">{{ $categoryName }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
