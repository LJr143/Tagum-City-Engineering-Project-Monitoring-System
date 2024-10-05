<x-guest-layout>

    <div class="h-full mt-10" style="margin-left: 50px" >
        <img src="{{ asset('storage/pmsAssets/pms_logo.png') }}" alt="" style="width: 180px">

        <div style="margin-left: 60px; width: 350px">
            <p class="font-bold mt-10" style="font-size: 25px; color: #249000">WELCOME BACK</p>
            <p class="text-black" style="font-size: 10px">Don't have an account? <span><a class="text-blue-500" href="{{ route('register') }}"> Create an Account here</a></span></p>
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
                     <x-label for="email" value="{{ __('Email') }}" />
                     <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                 </div>

                 <div class="mt-4">
                     <x-label for="password" value="{{ __('Password') }}" />
                     <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                 </div>

                 <div class="flex mt-4 justify-between">
                     <label for="remember_me" class="flex items-center">
                         <x-checkbox id="remember_me" name="remember" />
                         <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                     </label>
                     <div>
                         @if (Route::has('password.request'))
                             <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                 {{ __('Forgot your password?') }}
                             </a>
                         @endif
                     </div>

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


</x-guest-layout>
