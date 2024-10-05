<x-guest-layout>

    <div class="h-full w-full">
        <div class="w-full text-center bg-white p-5">
            <p class="font-[700] text-black" style="font-size: 18px">LET'S GET YOU STARTED</p>
            <p class="text-black text-[14px]">Enter the details to get going</p>
        </div>

        <x-validation-errors class="mb-4" />
        <div class="flex  justify-center min-h-screen mt-10 overflow-y-hidden">
            <form class="w-full max-w-[550px] " method="POST" action="{{ route('register') }}">
                @csrf

                <div class="flex gap-4">
                    <div class="w-3/5">
                        <x-label class="text-black" style="font-size: 12px;" for="first_name" value="{{ __('First Name') }}" />
                        <x-input id="first_name" class="block mt-1 w-full text-[12px]" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                    </div>

                    <div class="w-3/5">
                        <x-label class="text-black" style="font-size: 12px;" for="last_name" value="{{ __('Last Name') }}" />
                        <x-input id="last_name" class="block mt-1 w-full text-[12px]" type="text" name="last_name" :value="old('last_name')" required autocomplete="last_name" />
                    </div>

                    <div class="w-1/5">
                        <x-label class="text-black" style="font-size: 12px;" for="middle_initial" value="{{ __('M.I. ') }}" />
                        <x-input id="middle_initial" class="block mt-1 w-full text-[12px]" type="text" name="middle_initial" :value="old('middle_initial')" required autocomplete="middle_initial" />
                    </div>
                </div>

                <div class="flex gap-4 mt-5">
                    <div class="w-1/2">
                        <x-label class="text-black" style="font-size: 12px;" for="gender" value="{{ __('Gender') }}" />
                        <select id="gender" name="gender" class="block mt-1 w-full text-[12px] border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="w-1/2">
                        <x-label class="text-black" style="font-size: 12px;" for="birth_date" value="{{ __('Birth Date') }}" />
                        <x-input  id="birth_date" class="block mt-1 w-full text-[12px]" type="date" name="birth_date" :value="old('birth_date')" required autocomplete="birth_date" />
                    </div>
                </div>


                <div class="flex gap-4 mt-5">
                    <div class="w-2/3">
                        <x-label class="text-black" style="font-size: 12px;" for="email" value="{{ __('Email ') }}" />
                        <x-input id="email" class="block mt-1 w-full text-[12px]" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="w-1/3">
                        <x-label class="text-black" style="font-size: 12px;" for="contact_number" value="{{ __('Contact Number') }}" />
                        <x-input  id="contact_number" class="block mt-1 w-full text-[12px]" type="text" name="contact_number" :value="old('contact_name')" required autocomplete="contact_number" />
                    </div>
                </div>


                <div class="flex gap-4 mt-5">
                    <div class="w-2/3">
                        <x-label class="text-black" style="font-size: 12px;" for="position" value="{{ __('Position ') }}" />
                        <x-input id="position" class="block mt-1 w-full text-[12px]" type="text" name="position" :value="old('position')" required autofocus autocomplete="position" />
                    </div>

                    <div class="w-1/3">
                        <x-label class="text-black" style="font-size: 12px;" for="role" value="{{ __('Role') }}" />
                        <select id="role" name="role" class="block mt-1 w-full text-[12px] border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            <option value="" disabled selected>Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                            <option value="engineer">Engineer</option>
                        </select>
                    </div>
                </div>


                <div class="mt-4">
                    <x-label style="font-size: 12px;" for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full text-[12px]" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label style="font-size: 12px;" for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full text-[12px]" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />

                                <div class="ms-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ms-4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </div>
        </div>
</x-guest-layout>
