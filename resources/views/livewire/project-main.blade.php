@livewire('project-manager')
@livewireStyles
@livewireScripts

<div class="w-4/5 p-6 bg-gray-50">
    <!-- Header -->
    <header class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Projects</h1>
    </header>

    <!-- Create Project Button -->
    <div class="flex justify-end">
        <div class="relative ml-4">
            <button wire:click="createProject" class="bg-green-500 text-white px-4 py-2 rounded-lg">
                Create Project
            </button>
        </div>
    </div>

    <!-- Modal -->
    @if($open)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white w-full max-w-3xl p-6 rounded-lg relative">
                <!-- Close Button (X) -->
                <button wire:click="closeProjectModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Modal Content -->
                <h2 class="text-xl font-bold mb-4">Project Title</h2>
                <p class="text-gray-500 mb-6">Title</p>

                <div class="grid grid-cols-2 gap-4">
                    <!-- Form Inputs on the Left -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none" placeholder="Address">

                        <label class="block text-sm font-medium text-gray-700 mt-4 mb-1">Budget</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none" placeholder="Budget">

                        <label class="block text-sm font-medium text-gray-700 mt-4 mb-1">Role</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none" placeholder="Role">

                        <label class="block text-sm font-medium text-gray-700 mt-4 mb-1">Date</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none" placeholder="Date">
                    </div>

                    <!-- Upload Section on the Right -->
                    <div>
                        <h3 class="font-bold mb-2">Upload</h3>
                        <div class="border-2 border-dashed border-green-500 rounded-lg p-4 text-center mb-4 flex flex-col items-center justify-center">
                            <p>Drag & drop files or <a href="#" class="text-green-500">Browse</a></p>
                            <p class="text-sm text-gray-500">Supported formats: excel</p>
                        </div>

                        <p class="text-sm text-gray-500 mb-1">Uploading - 3/3 files</p>
                        <div class="bg-gray-100 border border-gray-300 rounded-lg py-2 px-4 flex items-center justify-between mb-2">
                            <span class="text-gray-700">your-file-here.PDF</span>
                            <span class="text-green-500">✔</span>
                        </div>

                        <p class="font-bold mb-1">Uploaded</p>
                        <div class="border border-green-500 rounded-lg py-2 px-4 flex items-center justify-between mb-2">
                            <span>document-name.PDF</span>
                            <button class="text-red-500">&times;</button>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end mt-6">
                    <button wire:click="closeProjectModal" class="bg-gray-200 text-gray-700 font-bold px-4 py-2 rounded-lg mr-2">Cancel</button>
                    <button class="bg-green-500 text-white font-bold px-4 py-2 rounded-lg">Save</button>
                </div>
            </div>
        </div>
    @endif

    <!-- Project Filter -->
    <div class="flex mb-4 bg-gray-100 p-2 rounded-full max-w-2xl justify-between">
        @foreach (['all' => 237, 'onProgress' => 2, 'pending' => 4, 'closed' => 2] as $status => $count)
            <button
                wire:click="$set('selected', '{{ $status }}')"
                class="flex-grow px-6 py-2 rounded-full mx-1 font-bold {{ $selected === $status ? 'bg-white text-black' : 'bg-gray-100 text-gray-600 hover:text-black' }}">
                <span class="{{ $selected === $status ? 'text-green-500' : 'text-gray-600' }}">{{ $count }}</span> {{ ucfirst($status) }}
            </button>
        @endforeach
    </div>

    <!-- Projects Grid -->
    <div class="grid gap-6">
        @foreach ($projects as $project)
            <div class="bg-white p-6 rounded-lg shadow-md flex justify-between items-center">
                <div class="flex flex-col">
                    <div class="text-green-500 text-xs font-bold mb-3">{{ $project['code'] }}</div>
                    <h2 class="text-xl font-semibold">{{ $project['name'] }}</h2>

                    <div class="flex items-center mt-2">
                        <svg class="w-6 h-6 text-gray-600 mr-4" xmlns="http://www.w3.org/2000/svg">
                            <!-- SVG content -->
                        </svg>
                        <p class="text-gray-500 text-sm font-semibold">Created on {{ $project['created'] }}</p>
                    </div>
                </div>

                <div class="flex items-center">
                    <div class="text-left">
                        <p class="text-gray-500 text-sm font-bold">Project Cost</p>
                        <p class="text-xl font-semibold">{{ $project['cost'] }}</p>
                    </div>
                </div>

                <div class="flex items-center">
                    <div class="flex flex-col">
                        <p class="text-gray-500 text-sm font-bold">Engineer</p>
                        <p class="font-semibold">{{ $project['engineer'] }}</p>
                    </div>

                    <div class="relative w-48 h-2 bg-gray-200 rounded-full overflow-hidden ml-6">
                        <div class="bg-yellow-500 h-full" style="width: {{ $project['progress'] }}%;"></div>
                    </div>
                    <span class="ml-4 text-yellow-500">{{ $project['progress'] }}%</span>
                </div>

                <div class="flex items-center">
                    <span class="bg-green-500 text-white px-6 py-2 rounded-3xl">{{ $project['status'] }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
