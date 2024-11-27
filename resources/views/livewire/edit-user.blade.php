<div class="flex text-left" x-data="{ open: false }" x-cloak @open-edit-modal.window="open = true" @user-edited.window="open = false">
<div class="flex justify-end">
        <div class="relative ml-2">
            <button @click="open = true" class="flex bg-green-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-green-600 focus:outline-none">

                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-2">
                    <path d="M21 7L17 3L14 6L8 12V16H12L18 10L21 7Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 6L18 10" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 4H4V20H20V14" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

            </button>
        </div>
    </div>

    <!-- Modal -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
    >
        <!-- Modal Content -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="bg-white w-full max-w-[700px] p-6 rounded-lg relative"
        >
            <!-- Close Button (X) -->
            <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h2 class="text-lg font-bold mb-4">Edit User Information</h2>
            <form wire:submit.prevent="submit" class="text-xs">
            <div class="flex gap-2">
                    <div class="w-2/5">
                        <div class="flex flex-col space-y-2">
                            <label for="first_name" class="block text-gray-700 text-xs">First Name</label>
                            <input type="text" id="first_name" wire:model="first_name"
                                   class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
                                   required>
                            @error('first_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="w-2/5">
                        <div class="flex flex-col space-y-1">
                            <label for="last_name" class="block text-gray-700 text-xs">Last Name</label>
                            <input type="text" id="last_name" wire:model="last_name"
                                   class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
                                   required>
                            @error('last_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="w-1/5">
                        <div class="flex flex-col space-y-1">
                            <label for="middle_initial" class="block text-gray-700 text-xs">M.I</label>
                            <input type="text" id="middle_initial" wire:model="middle_initial"
                                   class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
                                   required>
                            @error('middle_initial') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="flex gap-2">
                    <div class="w-3/4">
                        <div class="flex flex-col space-y-1">
                            <label for="email" class="block text-gray-700 text-xs">Email</label>
                            <input type="text" id="email" wire:model="email"
                                   class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
                                   required>
                            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="w-1/4">
                        <div class="flex flex-col space-y-1">
                            <label for="gender" class="block text-gray-700 text-xs">Gender</label>
                            <select wire:model="gender"
                                    class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select>
                            @error('gender') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="flex gap-2">
                    <div class="w-2/4">
                        <div class="flex flex-col space-y-1">
                            <label for="contact_number" class="block text-gray-700 text-xs">Contact Number</label>
                            <input type="text" id="contact_number" wire:model="contact_number"
                                   class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
                                   required>
                            @error('contact_number') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="w-2/4">
                        <div class="flex flex-col space-y-1">
                            <label for="birth_date" class="block text-gray-700 text-xs">Birth Date</label>
                            <input type="date" id="birth_date" wire:model="birth_date"
                                   class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
                                   required>
                            @error('birth_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="position" class="block text-gray-700 text-xs">Position</label>
                    <input type="text" id="position" wire:model="position"
                           class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
                           required>
                    @error('position') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="role" class="block text-gray-700 text-xs">Access Role</label>
                    <select wire:model="role"
                            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs">
                        <option value="">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="encoder">Encoder</option>
                        <option value="project incharge">Project Incharge</option>
                    </select>
                    @error('role') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>


                <!-- Action Buttons -->
                <div class="flex justify-end space-x-2 mt-4">
                    <button type="button" @click="open = false" class="bg-gray-300 text-gray-700 rounded-md px-4 py-2 text-xs">Cancel</button>
                    <button type="submit" class="bg-green-700 text-white rounded-md px-4 py-2 text-xs hover:bg-green-800">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
