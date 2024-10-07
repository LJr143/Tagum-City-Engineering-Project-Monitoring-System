<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">
    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>

    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="main">
        <div>
            <div class="flex-1 p-5">
                <div class="flex justify-end mb-4">
                    <div class="flex flex-col items-end space-y-2 w-full">
                        <div class="flex space-x-2">

                            <livewire:edit-project :project="$project->id" />


                            <form action="{{ route('project.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-red-600 focus:outline-none">
                                    Delete
                                </button>
                            </form>
                        </div>

                        <div class="relative flex flex-col items-center space-y-2 mt-4 w-full">
                            <div class="w-full h-40 bg-gray-200 flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('storage/pmsAssets/pic1.jpg') }}" alt="Profile Image" id="editable-image-preview" class="object-contain w-full h-full">
                                <input type="file" id="editable-image" class="absolute top-0 right-0 w-20 h-20 opacity-0 cursor-pointer" accept="image/*" onchange="previewImage(event)">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ml-8 flex justify-between items-center">
                    <h2 class="text-m font-semibold mb-2">{{ $project->title }}</h2>
                    <span class="text-xs text-green-500 bg-green-100 px-2 py-1 rounded">{{ $project->status }}</span>
                </div>
                <p class="text-xs ml-8">{{ $project->address }}</p>
                <p class="ml-8 text-xs text-green-700">Date created:<span class="ml-2 text-black">{{ $project->created_at }}</span></p>
                <p class="ml-8 text-xs font-semibold">Project Cost: {{ $project->project_cost }} <span class="ml-4 font-semibold">Engineer: Jane Williams</span></p>

                <div class="ml-8 mt-7 mb-10">
                    <h2 class="text-sm font-semibold mb-2">Description</h2>
                    <p class="text-xs">{{ $project->description }}</p>
                </div>

                <livewire:program-of-works :project-id="$project->id"/>
            </div>

        </div>

        <script>
            // Preview uploaded image
            function previewImage(event) {
                const file = event.target.files[0];
                const preview = document.getElementById('editable-image-preview');
                const reader = new FileReader();

                reader.onload = function() {
                    preview.src = reader.result;
                };

                if (file) {
                    reader.readAsDataURL(file);
                }
            }

            // Modal behavior (optional)
            window.addEventListener('projectUpdated', event => {
                // Optional: Any additional behavior after a project is updated
            });
        </script>
    </x-slot>
</x-app-layout>
