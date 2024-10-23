<x-guest-layout>

    <div class="h-full mt-10" style="margin-left: 50px" >
        <img src="{{ asset('storage/pmsAssets/pms_logo.png') }}" alt="" style="width: 200px">

        <div style="margin-left: 60px; width: 350px">
            <p class="font-bold mt-10" style="font-size: 25px; color: #249000">WELCOME BACK</p>
{{--            <p class="text-black" style="font-size: 10px">Don't have an account? <span><a class="text-blue-500" href="{{ route('register') }}"> Create an Account here</a></span></p>--}}
            <p class="text-black font-bold" style="font-size: 10px">TC-PMS  <span class="font-medium">is a project monitoring system dedicated for the city of Tagum’s office of the city Engineer</span></p>
            <p class="text-black font-bold mt-10" style="color: #249000; font-size: 12px">PLEASE LOGIN TO CONTINUE</p>


         <div class="mt-5">
             <x-validation-errors class="mb-4" />

             @session('status')
             <div class="mb-4 font-medium text-sm text-green-600">
                 {{ $value }}
             </div>
             @endsession


             <form method="POST" action="{{ route('login') }}">
                 @csrf

                 <div>
                     <x-label for="username" value="{{ __('Username') }}" />
                     <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                 </div>

                 <div class="mt-4 relative">
                     <x-label for="password" value="{{ __('Password') }}" />
                     <div class="relative">
                         <x-input id="password" class="block mt-1 w-full pr-10" type="password" name="password" required autocomplete="current-password" />

                         <!-- Password eye -->
                         <button type="button" id="toggle-password" class="absolute inset-y-0 right-0 flex items-center pr-3">
                             <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5 text-gray-400">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5c-7.5 0-10.5 7.5-10.5 7.5S4.5 16.5 12 16.5s10.5-7.5 10.5-7.5S19.5 4.5 12 4.5z" />
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M17.5 12c0 1.5-1 3-3 3s-3-1.5-3-3 1-3 3-3 3 1.5 3 3z" />
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M2.5 2.5l19 19" />
                             </svg>
                         </button>
                     </div>
                 </div>



                 <div class="flex mt-4 justify-between">
                     <label for="remember_me" class="flex items-center">
                         <x-checkbox id="remember_me" name="remember" />
                         <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                     </label>
{{--                     <div>--}}
{{--                         @if (Route::has('password.request'))--}}
{{--                             <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">--}}
{{--                                 {{ __('Forgot your password?') }}--}}
{{--                             </a>--}}
{{--                         @endif--}}
{{--                     </div>--}}

                 </div>

                 <div class="mt-8">
                     <x-button class="w-[350px] h-[40px] flex items-center justify-center bg-[#249000] text-sm">
                         {{ __('Log in') }}
                     </x-button>
                 </div>
             </form>
         </div>
        </div>
    </div>
    <script>
        document.getElementById('toggle-password').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');


            if (passwordInput.type === 'password') {
                passwordInput.type = 'text'; // Show password
                eyeIcon.innerHTML = `<!-- Open Eye SVG -->`;
                eyeIcon.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5 text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5c-7.5 0-10.5 7.5-10.5 7.5S4.5 16.5 12 16.5s10.5-7.5 10.5-7.5S19.5 4.5 12 4.5z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15.5a3 3 0 100-6 3 3 0 000 6z" />
            </svg>`;
            } else {
                passwordInput.type = 'password'; // Hide password
                eyeIcon.innerHTML = `<!-- Closed Eye with Slash SVG -->`;
                eyeIcon.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5 text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5c-7.5 0-10.5 7.5-10.5 7.5S4.5 16.5 12 16.5s10.5-7.5 10.5-7.5S19.5 4.5 12 4.5z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.5 12c0 1.5-1 3-3 3s-3-1.5-3-3 1-3 3-3 3 1.5 3 3z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.5 2.5l19 19" />
            </svg>`;
            }
        });

    </script>

</x-guest-layout>
