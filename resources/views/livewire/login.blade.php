<div class="h-screen w-screen flex overflow-hidden">
    <!-- Left side with logo and background -->
    <div class="w-1/2 h-full bg-cover bg-center" style="background-image: url('{{ asset('storage/pmsAssets/images/background1.png') }}');">
        <div class="flex items-center justify-center h-full bg-black bg-opacity-50">
            <div class="text-center text-white">
                <img src="{{ asset('storage/pmsAssets/images/citylogo.png') }}" alt="City Logo" class="mx-auto mb-8" style="width: 150px;">
                <h1 class="text-4xl font-bold">TC-PMS</h1>
                <p class="text-xl">Tagum City Project Monitoring System</p>
                <p class="mt-4 font-semibold">"WE ARE TAGUM"</p>
            </div>
        </div>
    </div>

    <!-- Right side with login form -->
    <div class="w-1/2 h-full flex justify-center items-center bg-white">
        <div class="w-full max-w-md px-8">
            <h2 class="text-2xl font-semibold text-green-600">WELCOME BACK!</h2>
            <p class="text-sm text-gray-600 mb-6">Don't have an account?
                <a href="#" class="text-blue-600 hover:underline">Create an Account here</a>
            </p>
            <form wire:submit.prevent="login">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                    <input type="text" id="username" wire:model="username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" placeholder="Username">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" id="password" wire:model="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" placeholder="Password">
                </div>
                <div class="flex justify-between items-center mb-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox h-4 w-4 text-green-600">
                        <span class="ml-2 text-gray-700">Remember me</span>
                    </label>
                    <a href="#" class="text-sm text-gray-600 hover:underline">Forgot Password?</a>
                </div>
                <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">LOG IN</button>
            </form>
        </div>
    </div>
</div>
