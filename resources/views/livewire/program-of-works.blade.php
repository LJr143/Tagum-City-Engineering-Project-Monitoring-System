<!-- Cards Display -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @if ($cards->isEmpty())
        <div class="text-center text-gray-500">
            No program of work for this project.
        </div>
    @else
        @foreach ($cards as $card)
            <a href="{{ route('material-table-cost') }}" class="bg-white p-6 rounded-lg shadow-md block transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">
                <div class="bg-green-600 text-white text-xs px-2 py-1 rounded w-max mb-2">Ref: {{ $card->reference_number }}</div>
                <h3 class="text-lg font-bold text-black">POW {{ $card->reference_number }}</h3>
                <p class="mt-2 text-gray-600 text-xs">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint...</p>
                <br>
                <div class="my-3 border-t border-gray-300"></div>
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
                        <img src="{{ asset('images/pic1.jpg') }}" alt="Engineer Image" class="w-12 h-12 rounded-full object-cover">
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs">Senior Engineer</p>
                        <p class="text-black">John Doe</p>
                    </div>
                </div>
            </a>
        @endforeach

        {{-- Pagination Links --}}
        <div class="mt-4">
            {{ $cards->links() }} <!-- Render pagination links -->
        </div>
    @endif


</div>
</div>
