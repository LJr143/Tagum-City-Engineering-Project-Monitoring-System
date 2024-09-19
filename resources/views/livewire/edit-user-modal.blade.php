<div>
    <!-- Add/Edit User Button -->
    <button wire:click="openModal" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Edit User
    </button>

    <!-- Modal Background -->
    @if($isModalOpen)
        <div class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center p-4" wire:ignore.self>
            <!-- Modal Container -->
            <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6 w-full max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-3xl relative">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold">Edit User</h2>
                    <!-- Close button (X) -->
                    <button wire:click="closeModal" class="text-gray-500 hover:text-gray-700 absolute top-2 right-2">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <form wire:submit.prevent="saveUser">
                    <!-- User ID Field -->
                    <div class="mb-4">
                        <label class="block text-gray-700">User ID</label>
                        <input type="text" wire:model="userId" placeholder="0101" class="w-full mt-1 p-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="user-id" type="text" value="XXXX" disabled>

                        @error('userId') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Name Field -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Name</label>
                        <input type="text" wire:model="name" class="w-full mt-1 p-2 border rounded" placeholder="Enter Name">
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Email</label>
                        <input type="email" wire:model="email" class="w-full mt-1 p-2 border rounded" placeholder="fnamemilname@gmail.com">
                        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Birthdate and Age Fields -->
                    <div class="flex flex-col sm:flex-row sm:space-x-4 mb-4">
                        <div class="w-full sm:w-1/2 mb-4 sm:mb-0">
                            <label class="block text-gray-700" for="birthdate">Birthdate</label>
                            <input type="date" id="birthdate" wire:model="birthdate" class="w-full mt-1 p-2 border rounded" onchange="calculateAge()">
                            @error('birthdate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full sm:w-1/2">
                            <label class="block text-gray-700" for="age">Age</label>
                            <input type="number" id="age" wire:model="age" class="w-full mt-1 p-2 border rounded" readonly>
                            @error('age') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Position and Role Fields -->
                    <div class="flex flex-col sm:flex-row sm:space-x-4 mb-4">
                        <div class="w-full sm:w-1/2 mb-4 sm:mb-0">
                            <label class="block text-gray-700">Position</label>
                            <select wire:model="position" class="w-full mt-1 p-2 border rounded">
                                <option value="">Select Position</option>
                                @foreach($positions as $position)
                                    <option value="{{ $position }}">{{ $position }}</option>
                                @endforeach
                            </select>
                            @error('position') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full sm:w-1/2">
                            <label class="block text-gray-700">Role</label>
                            <select wire:model="role" class="w-full mt-1 p-2 border rounded">
                                <option value="">Select Role</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row sm:space-x-4 justify-between">
                        <button type="button" wire:click="closeModal" class="w-full sm:w-1/2 py-2 border rounded text-gray-700 hover:bg-gray-100 mb-4 sm:mb-0">Cancel</button>
                        <button type="submit" class="w-full sm:w-1/2 py-2 bg-green-600 text-white rounded hover:bg-green-700">Save</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>

<script>
    function calculateAge() {
        const birthdateInput = document.getElementById('birthdate');
        const ageInput = document.getElementById('age');
        const birthdate = new Date(birthdateInput.value);
        const today = new Date();
        let age = today.getFullYear() - birthdate.getFullYear();
        const monthDifference = today.getMonth() - birthdate.getMonth();
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthdate.getDate())) {
            age--;
        }
        ageInput.value = age;
    }
</script>
