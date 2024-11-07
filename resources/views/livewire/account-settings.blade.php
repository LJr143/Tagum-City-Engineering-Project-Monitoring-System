<div class="mx-auto bg-white p-8 md:p-8 rounded-lg shadow-md overflow-hidden">
    @if (session()->has('message') || session()->has('error'))
    <div x-data="{ open: true, timer: null, progressWidth: 100 }"
        x-init="
                timer = setInterval(() => {
                    if (progressWidth > 0) {
                        progressWidth -= 1; // decrease width every interval
                    } else {
                        clearInterval(timer);
                        open = false;  // Close the modal when width reaches 0
                    }
                }, 100);
            "
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">

        <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 md:w-1/3 relative">
            <!-- Progress Bar -->
            <div class="absolute top-0 left-0 h-1 bg-green-600"
                :style="{ width: progressWidth + '%' }">
            </div>

            <!-- Modal Content -->
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-green-600">
                    @if (session()->has('message'))
                    Success
                    @else
                    Error
                    @endif
                </h2>
                <button @click="open = false; clearInterval(timer)" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-4">
                <p>
                    @if (session()->has('message'))
                    {{ session('message') }}
                    @else
                    {{ session('error') }}
                    @endif
                </p>
            </div>
            <div class="mt-6 text-right">
                <button @click="open = false; clearInterval(timer)" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Close</button>
            </div>
        </div>
    </div>
    @endif
    <div class="flex flex-col md:flex-row items-center mb-4">
        <div class="relative w-20 h-20 rounded-full overflow-hidden bg-gray-300">
            @if ($profilePhotoPath)
            <img src="{{ asset('storage/' . $profilePhotoPath) }}" alt="Profile Image" class="w-full h-full object-cover">
            @else
            <img src="{{ asset('storage/pmsAssets/default.png') }}" alt="Profile Image" class="w-full h-full object-cover">
            @endif
            <input type="file" wire:model="profileImage" id="imageUpload" accept="image/*" class="hidden">
            <label for="imageUpload" class="absolute bottom-0 right-0 bg-black bg-opacity-50 text-white p-1 rounded-full cursor-pointer">
                <i class="fas fa-camera"></i>
            </label>
        </div>
        <div class="ml-0 md:ml-4 text-center md:text-left">
            <h1 class="text-lg font-medium">{{ $first_name }} {{ $middle_initial }} {{ $last_name }}</h1>
            <p class="text-gray-500 text-xs">{{$role}}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Personal Information Section -->
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            <h2 class="text-md font-medium mb-2 relative pb-1 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-full after:h-[1px] after:bg-gray-300 w-full">
                Personal Information
            </h2>
            <div class="space-y-2">
                <div class="flex flex-row items-center">
                    <label class="text-gray-500 text-sm w-32">First Name</label>
                    <input type="text" wire:model="first_name" class="text-green-600 border border-gray-300 rounded-md focus:outline-none focus:border-green-600 w-3/4 h-8 p-2 text-sm">
                </div>
                <div class="flex flex-row items-center">
                    <label class="text-gray-500 text-sm w-32">Middle Name</label>
                    <input type="text" wire:model="middle_initial" class="text-green-600 border border-gray-300 rounded-md focus:outline-none focus:border-green-600 w-3/4 h-8 p-2 text-sm">
                </div>
                <div class="flex flex-row items-center">
                    <label class="text-gray-500 text-sm w-32">Last Name</label>
                    <input type="text" wire:model="last_name" class="text-green-600 border border-gray-300 rounded-md focus:outline-none focus:border-green-600 w-3/4 h-8 p-2 text-sm">
                </div>
                <div class="flex flex-row items-center">
                    <label class="text-gray-500 text-sm w-32">Birthdate</label>
                    <input type="date" wire:model="birthdate" class="text-green-600 border border-gray-300 rounded-md focus:outline-none focus:border-green-600 w-3/4 h-8 p-2 text-sm">
                </div>
                <!-- <div class="flex flex-row items-center mb-2">
                    <label class="text-gray-500 text-sm w-32">Age</label>
                    <input type="number" wire:model="age" min="1" class="text-green-600 border border-gray-300 rounded-md focus:outline-none focus:border-green-600 w-3/4 h-8 p-2 text-sm">
                </div> -->
            </div>
            <h2 class="text-md font-medium mt-4 mb-2 relative pb-1 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-full after:h-[1px] after:bg-gray-300 w-full">
                Contact Information
            </h2>
            <div class="space-y-2">
                <div class="flex flex-row items-center">
                    <label class="text-gray-500 text-sm w-32">Phone Number</label>
                    <input type="tel" wire:model="phoneNumber" class="text-green-600 border border-gray-300 rounded-md focus:outline-none focus:border-green-600 w-3/4 h-8 p-2 text-sm">
                </div>
                <div class="flex flex-row items-center">
                    <label class="text-gray-500 text-sm w-32">Email Address</label>
                    <input type="email" wire:model="email" class="text-green-600 border border-gray-300 rounded-md focus:outline-none focus:border-green-600 w-3/4 h-8 p-2 text-sm">
                </div>
            </div>
            <button wire:click="saveChanges" class="mt-4 w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">Save All Changes</button>
        </div>

        <!-- Account Information Section -->
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            <h2 class="text-md font-medium mb-2 relative pb-1 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-full after:h-[1px] after:bg-gray-300 w-full">
                User Account Information
            </h2>
            <div class="space-y-2">
                <div class="flex flex-row items-center">
                    <label class="text-gray-500 text-sm w-32">User ID</label>
                    <input type="text" wire:model="userID" class="border border-gray-300 rounded-md focus:outline-none focus:border-green-600 w-3/4 h-8 p-2 text-sm">
                </div>
                <div class="flex flex-row items-center">
                    <label class="text-gray-500 text-sm w-32">Current Password</label>
                    <input type="password" wire:model="currentPassword" class="border border-gray-300 rounded-md focus:outline-none focus:border-green-600 w-3/4 h-8 p-2 text-sm">
                </div>
                <div>
                    <h3 class="text-gray-500 font-medium text-sm">Password Requirements</h3>
                    <ul class="text-gray-500 text-xs list-disc list-inside">
                        <li>One special character</li>
                        <li>Min 6 characters</li>
                        <li>One number (2 are recommended)</li>
                        <li>Change it often</li>
                    </ul>
                </div>
                <div class="flex flex-row items-center">
                    <label class="text-gray-500 text-sm w-32">New Password</label>
                    <input type="password" wire:model="newPassword" class="border border-gray-300 rounded-md focus:outline-none focus:border-green-600 w-3/4 h-8 p-2 text-sm">
                </div>
                <div class="flex flex-row items-center">
                    <label class="text-gray-500 text-sm w-32">Re-type New Password</label>
                    <input type="password" wire:model="confirmNewPassword" class="border border-gray-300 rounded-md focus:outline-none focus:border-green-600 w-3/4 h-8 p-2 text-sm">
                </div>
            </div>
            <button wire:click="updateAccount" class="mt-4 w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">Update Account</button>
        </div>
    </div>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded-lg shadow-md mt-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>