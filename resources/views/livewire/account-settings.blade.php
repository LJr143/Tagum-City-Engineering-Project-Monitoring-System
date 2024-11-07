<div class="mx-auto bg-white p-8 md:p-8 rounded-lg shadow-md overflow-hidden">
    <div class="flex flex-col md:flex-row items-center mb-4">
        <div class="relative w-20 h-20">
            @if ($profilePhotoPath)
            <div class="profile-image mt-3">
                <img src="{{ asset('storage/' . $profilePhotoPath) }}" alt="Profile Image" width="200" class="rounded-full object-cover" />
            </div>
            @else
            <img src="{{ asset('storage/pmsAssets/default.png') }}" alt="Profile Image" class="w-full h-full bg-gray-300 rounded-full object-cover" />
            @endif
            <input type="file" wire:model="profileImage" id="imageUpload" accept="image/*" class="hidden" />
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
