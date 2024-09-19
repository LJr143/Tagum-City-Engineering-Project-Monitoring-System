<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet"/>
</head>
<body class="bg-gray-100 p-4 md:p-8 font-roboto">
<div class="max-w-4xl mx-auto bg-white p-4 md:p-8 rounded-lg shadow-md">
    <div class="flex flex-col md:flex-row items-center mb-8">
        <div class="relative w-24 h-24">
            <img src="{{ $profileImageUrl }}" alt="Profile Image" class="w-full h-full bg-gray-300 rounded-full object-cover"/>
            <input type="file" wire:model="profileImage" id="imageUpload" accept="image/*" class="hidden"/>
            <label for="imageUpload" class="absolute bottom-0 right-0 bg-black bg-opacity-50 text-white p-1 rounded-full cursor-pointer">
                <i class="fas fa-camera"></i>
            </label>
        </div>
        <div class="ml-0 md:ml-6 text-center md:text-left">
            <h1 class="text-2xl font-medium">{{ $name }}</h1>
            <p class="text-gray-500">Administrator</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Personal Information Section -->
        <div class="bg-white p-4 md:p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-medium mb-4 relative pb-2 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-full after:h-[2px] after:bg-gray-300">
                Personal Information
            </h2>
            <div class="space-y-4">
                <div class="flex flex-col">
                    <label class="text-gray-500">Name</label>
                    <input type="text" wire:model="name" class="text-green-600 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full">
                </div>
                <div class="flex flex-col">
                    <label class="text-gray-500">Birthdate</label>
                    <input type="date" wire:model="birthdate" class="text-green-600 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full">
                </div>
                <div class="flex flex-col">
                    <label class="text-gray-500">Age</label>
                    <input type="number" wire:model="age" min="1" class="text-green-600 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full">
                </div>
            </div>
            <h2 class="text-lg font-medium mt-6 mb-4 relative pb-2 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-full after:h-[2px] after:bg-gray-300">
                Contact Information
            </h2>
            <div class="space-y-4">
                <div class="flex flex-col">
                    <label class="text-gray-500">Phone Number</label>
                    <input type="tel" wire:model="phoneNumber" class="text-green-600 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full">
                </div>
                <div class="flex flex-col">
                    <label class="text-gray-500">Email Address</label>
                    <input type="email" wire:model="email" class="text-green-600 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full">
                </div>
            </div>
            <button wire:click="saveChanges" class="mt-6 w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">Save All Changes</button>
        </div>

        <!-- Account Information Section -->
        <div class="bg-white p-4 md:p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-medium mb-4 relative pb-2 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-full after:h-[2px] after:bg-gray-300">
                User Account Information
            </h2>
            <div class="space-y-4">
                <div class="flex flex-col">
                    <label class="text-gray-500">User ID</label>
                    <input type="text" wire:model="userID" class="border-b border-gray-300 focus:outline-none focus:border-green-600 w-full">
                </div>
                <div class="flex flex-col">
                    <label class="text-gray-500">Current Password</label>
                    <input type="password" wire:model="currentPassword" class="border-b border-gray-300 focus:outline-none focus:border-green-600 w-full">
                </div>
                <div>
                    <h3 class="text-gray-500 font-medium">Password Requirements</h3>
                    <ul class="text-gray-500 text-sm list-disc list-inside">
                        <li>One special character</li>
                        <li>Min 6 characters</li>
                        <li>One number (2 are recommended)</li>
                        <li>Change it often</li>
                    </ul>
                </div>
                <div class="flex flex-col">
                    <label class="text-gray-500">New Password</label>
                    <input type="password" wire:model="newPassword" class="border-b border-gray-300 focus:outline-none focus:border-green-600 w-full">
                </div>
                <div class="flex flex-col">
                    <label class="text-gray-500">Re-type New Password</label>
                    <input type="password" wire:model="confirmNewPassword" class="border-b border-gray-300 focus:outline-none focus:border-green-600 w-full">
                </div>
            </div>
            <button wire:click="updateAccount" class="mt-6 w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">Update Account</button>
        </div>
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

<script>
    function loadFile(event) {
        var image = document.getElementById('profileImage');
        image.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
</body>
</html>
