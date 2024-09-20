<div class="flex lg:hidden">
    <button @click="subSide = true"
        class="p-2.5 text-center hover:bg-[#ededed] focus:bg-[#eaeaea]  ease-in-out  rounded-full">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3 12H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
            <path d="M3 6H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M3 18H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </button>
</div>

<livewire:search-anything />

<div class="flex items-center gap-5">
    <div class="relative" x-data="{showProfile: false}" @click.outside="showProfile = false">
        <button @click="showProfile = !showProfile"
            class="hover:bg-[#ededed] flex focus:bg-[#eaeaea] items-center gap-3 p-1.5 bg-[#F8F8FA] rounded-full">
            {{--
                <<<<<<< HEAD
                    {{--
            <img src="{{ auth()->user()->profile_photo_path ? asset('storage/' . auth()->user()->profile_photo_path) : asset('default.png') }}" alt="profile" class="rounded-full object-cover bg-center w-8 h-8">
            --}}
            =======
            {{--}} <img src="{{ auth()->user()->profile_photo_path ? asset('storage/' . auth()->user()->profile_photo_path) : asset('default.png') }}" alt="profile" class="rounded-full object-cover bg-center w-8 h-8">
            >>>>>>> a720d49f2cc11f7c1d4e27e904ea406e920b3c1c
            --}}
            {{-- @if($user)--}}
            {{-- <h1 class="text-sm">{{ $user->admin->username }}</h1>--}}
            {{-- @endif--}}
            <svg :class="{'rotate-180':showProfile, 'rotate-0':!showProfile}" class="transition ease-in-out mr-2 mx-2" width="10" height="10" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 1L4 4L1 1" stroke="#19323C" stroke-width="1.75" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>

        <div x-cloak x-show="showProfile"
            class=" absolute bg-white rounded-lg  shadow-md right-0 top-12 w-44 z-10 transition duration-300 ease-in-out transform origin-top"
            :class="{ 'scale-y-100': showProfile, 'scale-y-0': !showProfile }">
            <ul class="block text-sm divide-y py-1 text-[#4F6065]">
                <li class="">
                    <a href=""
                        @click="showProfile = false; subTmsActiveItem = ''; subActiveItem = ''; show = false; showManage = false; setActiveTab('profile')"
                        class="w-full flex gap-4 items-center px-[18px] py-2 hover:text-[#19323C] hover:bg-gray-200  ">
                        {{-- <x-iconoir-profile-circle class="w-5 h-5" />--}}
                        <p class="group  relative">
                            Your Profile
                        </p>
                    </a>
                </li>
                <li class="flex lg:hidden">
                    <a href=""
                        @click="showProfile = false; subTmsActiveItem = ''; subActiveItem = ''; show = false; showManage = false; setActiveTab('settings'); setsettingsTmsActiveItem('');"
                        class="w-full flex lg:hidden gap-4 items-center px-[18px] py-2 hover:text-[#19323C] hover:bg-gray-200  ">
                        <svg width="20" height="20" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.0961 1.39888L9.0964 1.39812C9.18604 1.16579 9.34376 0.965951 9.54891 0.824774C9.75384 0.683748 9.99655 0.60783 10.2453 0.606934H11.7547C12.0035 0.60783 12.2462 0.683746 12.4511 0.824774C12.6562 0.965951 12.814 1.1658 12.9036 1.39814L12.9039 1.39888L13.6965 3.44482L13.7739 3.64474L13.9598 3.75166L16.6509 5.29993L16.8351 5.40588L17.0451 5.37384L19.2145 5.04289C19.456 5.01101 19.7016 5.05119 19.9202 5.15835L19.9203 5.1584C20.1401 5.26605 20.3228 5.43641 20.4454 5.64783C20.4457 5.64826 20.4459 5.64869 20.4462 5.64912L21.1819 6.9366L21.1819 6.93662L21.1857 6.94309C21.3124 7.15868 21.3708 7.40755 21.3532 7.65684C21.3355 7.90628 21.2426 8.14451 21.0868 8.34008L21.0841 8.3435L19.7385 10.0576L19.609 10.2226V10.4324V13.529V13.7432L19.7435 13.91L21.1236 15.6213C21.1239 15.6217 21.1243 15.6221 21.1246 15.6226C21.2798 15.8179 21.3723 16.0556 21.39 16.3046C21.4076 16.5538 21.3492 16.8028 21.2225 17.0186L21.2225 17.0185L21.2189 17.0248L20.4833 18.312C20.483 18.3124 20.4828 18.3128 20.4826 18.3132C20.3597 18.525 20.1768 18.6954 19.9573 18.8029L19.9572 18.803C19.7384 18.9102 19.493 18.9503 19.2514 18.9185L17.0819 18.5876L16.8718 18.5556L16.6877 18.6615L13.9966 20.2098L13.8108 20.3167L13.7333 20.5166L12.9408 22.5626L12.9405 22.5633C12.8508 22.7957 12.6931 22.9955 12.4881 23.1365L12.4879 23.1366C12.2829 23.2777 12.0402 23.3536 11.7915 23.3545C11.7913 23.3545 11.7911 23.3545 11.7909 23.3545H10.246C10.2458 23.3545 10.2456 23.3545 10.2453 23.3545C9.99673 23.3536 9.75399 23.2777 9.54894 23.1366L9.54875 23.1365C9.34376 22.9955 9.18605 22.7957 9.0964 22.5633L9.0961 22.5626L8.30353 20.5166L8.22608 20.3167L8.04024 20.2098L5.34919 18.6615L5.16504 18.5556L4.95502 18.5876L2.7855 18.9185C2.54394 18.9503 2.29843 18.9102 2.07978 18.803L2.07955 18.8029C1.86005 18.6954 1.67724 18.525 1.55442 18.3134C1.55417 18.3129 1.55392 18.3125 1.55368 18.3121L0.818065 17.0248L0.818105 17.0248L0.814337 17.0184C0.687606 16.8028 0.629229 16.5539 0.646886 16.3045L0.0414673 16.2616L0.646886 16.3045C0.664543 16.0551 0.757407 15.8169 0.913228 15.6214L0.91324 15.6214L0.915982 15.6179L2.26151 13.9037L2.39103 13.7387V13.529V10.4324V10.2182L2.25654 10.0514L0.876364 8.34003C0.876026 8.33961 0.875689 8.33918 0.875351 8.33876C0.72014 8.14345 0.62764 7.90575 0.610022 7.65689C0.592365 7.40749 0.650747 7.15859 0.77746 6.94305L0.7775 6.94308L0.78121 6.93658L1.51758 5.64795C1.64035 5.43641 1.82314 5.26602 2.04282 5.15837C2.26162 5.05117 2.50717 5.01101 2.7486 5.04289L4.91813 5.37384L5.12619 5.40558L5.30924 5.30169L8.03716 3.75342L8.22536 3.64661L8.30352 3.44482L9.0961 1.39888ZM11 16.4386C13.462 16.4386 15.4579 14.4427 15.4579 11.9807C15.4579 9.51868 13.462 7.52282 11 7.52282C8.53801 7.52282 6.54215 9.51868 6.54215 11.9807C6.54215 14.4427 8.53801 16.4386 11 16.4386Z"
                                stroke="#19323C" stroke-width="1.21387" />
                        </svg>
                        <p class="group  relative">
                            Settings
                        </p>
                    </a>
                </li>
                <li class="">
                    <form method="GET" action="">
                        @csrf
                        <button type="submit" @if (request()->routeIs('client.step')){ @click.prevent="preventAction = true" }@endif
                            @click="showProfile = false; subTmsActiveItem = ''; subActiveItem = ''; show = false; showManage = false; setActiveTab('dashboard'); setsettingsTmsActiveItem('');"
                            class="w-full flex gap-4 items-center px-4 py-2 hover:text-[#19323C] hover:bg-gray-200 ">
                            <x-bx-log-out class="w-5 h-5" />
                            <p class="group  relative">
                                Sign Out
                            </p>
                        </button>
                    </form>
                </li>
            </ul>

        </div>
    </div>
    <a href=""
        @click="subTmsActiveItem = ''; subActiveItem = ''; show = false; showManage = false; setActiveTab('settings'); setsettingsTmsActiveItem('');"
        class="p-2.5 hover:bg-[#ededed] focus:bg-[#eaeaea] hidden lg:flex ease-in-out  rounded-full">
        <svg width="23" height="23" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M9.0961 1.39888L9.0964 1.39812C9.18604 1.16579 9.34376 0.965951 9.54891 0.824774C9.75384 0.683748 9.99655 0.60783 10.2453 0.606934H11.7547C12.0035 0.60783 12.2462 0.683746 12.4511 0.824774C12.6562 0.965951 12.814 1.1658 12.9036 1.39814L12.9039 1.39888L13.6965 3.44482L13.7739 3.64474L13.9598 3.75166L16.6509 5.29993L16.8351 5.40588L17.0451 5.37384L19.2145 5.04289C19.456 5.01101 19.7016 5.05119 19.9202 5.15835L19.9203 5.1584C20.1401 5.26605 20.3228 5.43641 20.4454 5.64783C20.4457 5.64826 20.4459 5.64869 20.4462 5.64912L21.1819 6.9366L21.1819 6.93662L21.1857 6.94309C21.3124 7.15868 21.3708 7.40755 21.3532 7.65684C21.3355 7.90628 21.2426 8.14451 21.0868 8.34008L21.0841 8.3435L19.7385 10.0576L19.609 10.2226V10.4324V13.529V13.7432L19.7435 13.91L21.1236 15.6213C21.1239 15.6217 21.1243 15.6221 21.1246 15.6226C21.2798 15.8179 21.3723 16.0556 21.39 16.3046C21.4076 16.5538 21.3492 16.8028 21.2225 17.0186L21.2225 17.0185L21.2189 17.0248L20.4833 18.312C20.483 18.3124 20.4828 18.3128 20.4826 18.3132C20.3597 18.525 20.1768 18.6954 19.9573 18.8029L19.9572 18.803C19.7384 18.9102 19.493 18.9503 19.2514 18.9185L17.0819 18.5876L16.8718 18.5556L16.6877 18.6615L13.9966 20.2098L13.8108 20.3167L13.7333 20.5166L12.9408 22.5626L12.9405 22.5633C12.8508 22.7957 12.6931 22.9955 12.4881 23.1365L12.4879 23.1366C12.2829 23.2777 12.0402 23.3536 11.7915 23.3545C11.7913 23.3545 11.7911 23.3545 11.7909 23.3545H10.246C10.2458 23.3545 10.2456 23.3545 10.2453 23.3545C9.99673 23.3536 9.75399 23.2777 9.54894 23.1366L9.54875 23.1365C9.34376 22.9955 9.18605 22.7957 9.0964 22.5633L9.0961 22.5626L8.30353 20.5166L8.22608 20.3167L8.04024 20.2098L5.34919 18.6615L5.16504 18.5556L4.95502 18.5876L2.7855 18.9185C2.54394 18.9503 2.29843 18.9102 2.07978 18.803L2.07955 18.8029C1.86005 18.6954 1.67724 18.525 1.55442 18.3134C1.55417 18.3129 1.55392 18.3125 1.55368 18.3121L0.818065 17.0248L0.818105 17.0248L0.814337 17.0184C0.687606 16.8028 0.629229 16.5539 0.646886 16.3045L0.0414673 16.2616L0.646886 16.3045C0.664543 16.0551 0.757407 15.8169 0.913228 15.6214L0.91324 15.6214L0.915982 15.6179L2.26151 13.9037L2.39103 13.7387V13.529V10.4324V10.2182L2.25654 10.0514L0.876364 8.34003C0.876026 8.33961 0.875689 8.33918 0.875351 8.33876C0.72014 8.14345 0.62764 7.90575 0.610022 7.65689C0.592365 7.40749 0.650747 7.15859 0.77746 6.94305L0.7775 6.94308L0.78121 6.93658L1.51758 5.64795C1.64035 5.43641 1.82314 5.26602 2.04282 5.15837C2.26162 5.05117 2.50717 5.01101 2.7486 5.04289L4.91813 5.37384L5.12619 5.40558L5.30924 5.30169L8.03716 3.75342L8.22536 3.64661L8.30352 3.44482L9.0961 1.39888ZM11 16.4386C13.462 16.4386 15.4579 14.4427 15.4579 11.9807C15.4579 9.51868 13.462 7.52282 11 7.52282C8.53801 7.52282 6.54215 9.51868 6.54215 11.9807C6.54215 14.4427 8.53801 16.4386 11 16.4386Z"
                stroke="#19323C" stroke-width="1.75" />
        </svg>
    </a>

</div>