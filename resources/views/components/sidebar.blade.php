{{-- HEADER --}}

<div class="h-[85px] justify-between items-center px-5 hidden lg:flex transform ease-in-out transition"
    :class="{'w-[270px]':showSide, 'w-[100px]':!showSide}">

    <div class="mt-10" :class="{'block':showSide, 'hidden':!showSide}">
        <img src="{{ asset('storage/pmsAssets/pms_logo.png') }}" class="h-30 w-40 ml-1.5" alt="logo">
    </div>
    <button @click="showSide = ! showSide; show = false; showManage = false"
        :class="{'hover:bg-customGreen-50 focus:bg-customGreen-100':showSide, 'bg-customGreen-100':!showSide}" class="p-3 ml-2 rounded-xl">
        <svg class="transform ease-in-out transition" :class="{'rotate-180':!showSide,'rotate-0':showSide}" width="17"
            height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.17742 13.3548L1 7.17742L7.17742 1" stroke="#BA2C2C" stroke-width="1.90074"
                stroke-linecap="round" stroke-linejoin="round" />
            <path d="M15.731 12.4045L10.5039 7.17743L15.731 1.95038" stroke="#BA2C2C" stroke-opacity="0.45"
                stroke-width="1.50476" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>
</div>
{{-- NAVIGATION BUTTONS --}}
<div class="hidden w-full max-w-[270px] lg:flex flex-col justify-between pt-2 pb-10 flex-1 overflow-y-auto ">
    <div class="text-sm">
        <ul class="mt-10 space-y-1 tracking-wide">
            <li x-data="{toggle: false}" @mouseenter="toggle = true"
                @mouseleave="toggle = false"
                :style="toggle ? 'background-color: rgba(36, 144, 0, 0.3);' : ''">
<<<<<<< HEAD
                <a href="{{ route('dashboard') }}" @if (request()->routeIs('')){ @click.prevent="preventAction = true" }@endif aria-label="dashboard" @class(['relative flex items-center gap-3 px-6 py-0 text-Primary font-medium', ' text-customGreen font-semibold'=> request()->routeIs('dashboard')]) @mouseenter="toggle = true" @mouseleave="toggle = false"
                    @click="setActiveTab('dashboard'); show = false; showManage = false; subActiveItem = ''; setsubTmsActiveItem(''); setsettingsTmsActiveItem('')">
=======
                <a href="{{ route('dashboard') }}" @if (request()->routeIs('dashboard')){ @click.prevent="preventAction = true" }@endif aria-label="dashboard" @class(['relative flex items-center gap-3 px-6 py-0 text-Primary font-medium', ' text-customGreen font-semibold'=> request()->routeIs('dashboard')]) @mouseenter="toggle = true" @mouseleave="toggle = false"
                   @click="setActiveTab('dashboard'); show = false; showManage = false; subActiveItem = ''; setsubTmsActiveItem(''); setsettingsTmsActiveItem('')">
>>>>>>> a720d49f2cc11f7c1d4e27e904ea406e920b3c1c
                    <div class=" text-center p-[13px] rounded-full justify-center items-center flex"
                        :class="{'bg-customGreen-100': {{ request()->routeIs('dashboard') ? 'true' : 'false' }}, 'bg-none': {{ !request()->routeIs('dashboard') ? 'true' : 'false' }}}">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.47292 2.47192C2.81715 2.47192 2 3.28908 2 5.94484C2 8.6006 2.81715 9.41776 5.47292 9.41776C8.12868 9.41776 8.94583 8.6006 8.94583 5.94484C8.94583 3.28908 8.12868 2.47192 5.47292 2.47192Z" stroke="#3F3E44" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5.47292 12.196C2.81715 12.196 2 13.0132 2 15.669C2 18.3247 2.81715 19.1419 5.47292 19.1419C8.12868 19.1419 8.94583 18.3247 8.94583 15.669C8.94583 13.0132 8.12868 12.196 5.47292 12.196Z" stroke="#3F3E44" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15.1971 12.196C12.5414 12.196 11.7242 13.0132 11.7242 15.669C11.7242 18.3247 12.5414 19.1419 15.1971 19.1419C17.8528 19.1419 18.67 18.3247 18.67 15.669C18.67 13.0132 17.8528 12.196 15.1971 12.196Z" stroke="#3F3E44" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15.1971 2.47192C12.5414 2.47192 11.7242 3.28908 11.7242 5.94484C11.7242 8.6006 12.5414 9.41776 15.1971 9.41776C17.8528 9.41776 18.67 8.6006 18.67 5.94484C18.67 3.28908 17.8528 2.47192 15.1971 2.47192Z" stroke="#3F3E44" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <span class="-mr-1 " :class="{'block':showSide, 'hidden':!showSide}">Dashboard</span>
                </a>
            </li>

            <li x-data="{toggle: false}">
<<<<<<< HEAD
                <a href="" aria-label="dashboard" @class(['relative flex items-center gap-3 px-6 py-0 text-Primary font-medium', ' text-customGreen font-semibold'=> request()->routeIs('')]) @mouseenter="toggle = true" @mouseleave="toggle = false"
                    @click="setActiveTab(''); show = false; showManage = false; subActiveItem = ''; setsubTmsActiveItem(''); setsettingsTmsActiveItem('')">
                    <div class=" text-center p-[13px] rounded-full justify-center items-center flex"
                        :class="{'bg-customGreen-100': {{ request()->routeIs('') ? 'true' : 'false' }}, 'bg-none': {{ !request()->routeIs('') ? 'true' : 'false' }}}">
=======
                <a href="{{ route('project-main') }}" @if (request()->routeIs('project-main')){ @click.prevent="preventAction = true" }@endif" aria-label="project" @class(['relative flex items-center gap-3 px-6 py-0 text-Primary font-medium', ' text-customGreen font-semibold'=> request()->routeIs('project-main')]) @mouseenter="toggle = true" @mouseleave="toggle = false"
                   @click="setActiveTab(''); show = false; showManage = false; subActiveItem = ''; setsubTmsActiveItem(''); setsettingsTmsActiveItem('')">
                    <div class=" text-center p-[13px] rounded-full justify-center items-center flex"
                         :class="{'bg-customGreen-100': {{ request()->routeIs('project-main') ? 'true' : 'false' }}, 'bg-none': {{ !request()->routeIs('project-main') ? 'true' : 'false' }}}">
>>>>>>> a720d49f2cc11f7c1d4e27e904ea406e920b3c1c
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.51699 3.11139L3.02533 6.61139C2.27533 7.19472 1.66699 8.43639 1.66699 9.37806V15.5531C1.66699 17.4864 3.24199 19.0697 5.17533 19.0697H14.8253C16.7587 19.0697 18.3337 17.4864 18.3337 15.5614V9.49472C18.3337 8.48639 17.6587 7.19472 16.8337 6.61972L11.6837 3.01139C10.517 2.19472 8.64199 2.23639 7.51699 3.11139Z" stroke="#3F3E44" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10 15.7365V13.2365" stroke="#3F3E44" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </div>
                    <span class="-mr-1 " :class="{'block':showSide, 'hidden':!showSide}">Projects</span>
                </a>
            </li>


            <li x-data="{toggle: false}">
                <a href="" aria-label="dashboard" @class(['relative flex items-center gap-3 px-6 py-0 text-Primary font-medium', ' text-customGreen font-semibold'=> request()->routeIs('')]) @mouseenter="toggle = true" @mouseleave="toggle = false"
                    @click="setActiveTab(''); show = false; showManage = false; subActiveItem = ''; setsubTmsActiveItem(''); setsettingsTmsActiveItem('')">
                    <div class=" text-center p-[13px] rounded-full justify-center items-center flex"
                        :class="{'bg-customGreen-100': {{ request()->routeIs('') ? 'true' : 'false' }}, 'bg-none': {{ !request()->routeIs('') ? 'true' : 'false' }}}">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.9916 14.3969C16.4243 13.8804 16.663 13.229 16.6666 12.5552C16.6666 11.7817 16.3593 11.0398 15.8123 10.4928C15.2654 9.94582 14.5235 9.63853 13.7499 9.63853H13.5166C14.2038 8.82186 14.5815 7.78922 14.5833 6.72187C14.5852 5.95232 14.3934 5.19468 14.0254 4.5188C13.6575 3.84292 13.1253 3.27057 12.4779 2.85453C11.8305 2.43848 11.0888 2.19214 10.3211 2.13822C9.55346 2.0843 8.78458 2.22453 8.08539 2.54599C7.3862 2.86745 6.77921 3.35978 6.32038 3.97758C5.86156 4.59539 5.56568 5.31877 5.46003 6.08103C5.35437 6.84329 5.44235 7.61988 5.71585 8.33919C5.98934 9.05849 6.43954 9.69736 7.02494 10.1969C5.45017 10.7987 4.09496 11.8641 3.13829 13.2522C2.18162 14.6403 1.66847 16.286 1.66661 17.9719C1.66661 18.1929 1.75441 18.4048 1.91069 18.5611C2.06697 18.7174 2.27893 18.8052 2.49994 18.8052C2.72096 18.8052 2.93292 18.7174 3.0892 18.5611C3.24548 18.4048 3.33328 18.1929 3.33328 17.9719C3.33328 16.2038 4.03566 14.5081 5.2859 13.2578C6.53614 12.0076 8.23183 11.3052 9.99994 11.3052H11.1249C10.8808 11.8019 10.7871 12.359 10.8552 12.9082C10.9233 13.4575 11.1503 13.9748 11.5083 14.3969C10.7983 14.794 10.2071 15.3732 9.79551 16.0748C9.38391 16.7764 9.16682 17.5751 9.16661 18.3885C9.16661 18.6095 9.25441 18.8215 9.41069 18.9778C9.56697 19.1341 9.77893 19.2219 9.99994 19.2219C10.221 19.2219 10.4329 19.1341 10.5892 18.9778C10.7455 18.8215 10.8333 18.6095 10.8333 18.3885C10.8333 17.615 11.1406 16.8731 11.6875 16.3261C12.2345 15.7792 12.9764 15.4719 13.7499 15.4719C14.5235 15.4719 15.2654 15.7792 15.8123 16.3261C16.3593 16.8731 16.6666 17.615 16.6666 18.3885C16.6666 18.6095 16.7544 18.8215 16.9107 18.9778C17.067 19.1341 17.2789 19.2219 17.4999 19.2219C17.721 19.2219 17.9329 19.1341 18.0892 18.9778C18.2455 18.8215 18.3333 18.6095 18.3333 18.3885C18.3331 17.5751 18.116 16.7764 17.7044 16.0748C17.2928 15.3732 16.7015 14.794 15.9916 14.3969ZM9.99994 9.63853C9.42308 9.63853 8.85917 9.46747 8.37953 9.14699C7.89989 8.8265 7.52605 8.37098 7.3053 7.83803C7.08454 7.30507 7.02678 6.71863 7.13932 6.15285C7.25186 5.58707 7.52965 5.06737 7.93755 4.65947C8.34545 4.25157 8.86515 3.97378 9.43093 3.86124C9.99671 3.7487 10.5832 3.80646 11.1161 4.02722C11.6491 4.24797 12.1046 4.62181 12.4251 5.10145C12.7456 5.5811 12.9166 6.145 12.9166 6.72187C12.9166 7.49541 12.6093 8.23728 12.0623 8.78426C11.5154 9.33124 10.7735 9.63853 9.99994 9.63853ZM13.7499 13.8052C13.4184 13.8052 13.1005 13.6735 12.8661 13.4391C12.6316 13.2047 12.4999 12.8867 12.4999 12.5552C12.5021 12.2244 12.6345 11.9077 12.8685 11.6737C13.1024 11.4398 13.4191 11.3074 13.7499 11.3052C14.0815 11.3052 14.3994 11.4369 14.6338 11.6713C14.8682 11.9057 14.9999 12.2237 14.9999 12.5552C14.9999 12.8867 14.8682 13.2047 14.6338 13.4391C14.3994 13.6735 14.0815 13.8052 13.7499 13.8052Z" fill="#464255" />
                        </svg>
                    </div>
                    <span class="-mr-1 " :class="{'block':showSide, 'hidden':!showSide}">Users</span>
                </a>
            </li>
            <li x-data="{toggle: false}">
                <!-- <a href="route('systemlogs')" aria-label="dashboard" @class(['relative flex items-center gap-3 px-6 py-0 text-Primary font-medium', ' text-customGreen font-semibold'=> request()->routeIs('')]) @mouseenter="toggle = true" @mouseleave="toggle = false"
                @click="setActiveTab(''); show = false; showManage = false; subActiveItem = ''; setsubTmsActiveItem(''); setsettingsTmsActiveItem('')">
                <div class=" text-center p-[13px] rounded-full justify-center items-center flex"
                :class="{'bg-customGreen-100': {{ request()->routeIs('') ? 'true' : 'false' }}, 'bg-none': {{ !request()->routeIs('') ? 'true' : 'false' }}}">
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.9916 14.3969C16.4243 13.8804 16.663 13.229 16.6666 12.5552C16.6666 11.7817 16.3593 11.0398 15.8123 10.4928C15.2654 9.94582 14.5235 9.63853 13.7499 9.63853H13.5166C14.2038 8.82186 14.5815 7.78922 14.5833 6.72187C14.5852 5.95232 14.3934 5.19468 14.0254 4.5188C13.6575 3.84292 13.1253 3.27057 12.4779 2.85453C11.8305 2.43848 11.0888 2.19214 10.3211 2.13822C9.55346 2.0843 8.78458 2.22453 8.08539 2.54599C7.3862 2.86745 6.77921 3.35978 6.32038 3.97758C5.86156 4.59539 5.56568 5.31877 5.46003 6.08103C5.35437 6.84329 5.44235 7.61988 5.71585 8.33919C5.98934 9.05849 6.43954 9.69736 7.02494 10.1969C5.45017 10.7987 4.09496 11.8641 3.13829 13.2522C2.18162 14.6403 1.66847 16.286 1.66661 17.9719C1.66661 18.1929 1.75441 18.4048 1.91069 18.5611C2.06697 18.7174 2.27893 18.8052 2.49994 18.8052C2.72096 18.8052 2.93292 18.7174 3.0892 18.5611C3.24548 18.4048 3.33328 18.1929 3.33328 17.9719C3.33328 16.2038 4.03566 14.5081 5.2859 13.2578C6.53614 12.0076 8.23183 11.3052 9.99994 11.3052H11.1249C10.8808 11.8019 10.7871 12.359 10.8552 12.9082C10.9233 13.4575 11.1503 13.9748 11.5083 14.3969C10.7983 14.794 10.2071 15.3732 9.79551 16.0748C9.38391 16.7764 9.16682 17.5751 9.16661 18.3885C9.16661 18.6095 9.25441 18.8215 9.41069 18.9778C9.56697 19.1341 9.77893 19.2219 9.99994 19.2219C10.221 19.2219 10.4329 19.1341 10.5892 18.9778C10.7455 18.8215 10.8333 18.6095 10.8333 18.3885C10.8333 17.615 11.1406 16.8731 11.6875 16.3261C12.2345 15.7792 12.9764 15.4719 13.7499 15.4719C14.5235 15.4719 15.2654 15.7792 15.8123 16.3261C16.3593 16.8731 16.6666 17.615 16.6666 18.3885C16.6666 18.6095 16.7544 18.8215 16.9107 18.9778C17.067 19.1341 17.2789 19.2219 17.4999 19.2219C17.721 19.2219 17.9329 19.1341 18.0892 18.9778C18.2455 18.8215 18.3333 18.6095 18.3333 18.3885C18.3331 17.5751 18.116 16.7764 17.7044 16.0748C17.2928 15.3732 16.7015 14.794 15.9916 14.3969ZM9.99994 9.63853C9.42308 9.63853 8.85917 9.46747 8.37953 9.14699C7.89989 8.8265 7.52605 8.37098 7.3053 7.83803C7.08454 7.30507 7.02678 6.71863 7.13932 6.15285C7.25186 5.58707 7.52965 5.06737 7.93755 4.65947C8.34545 4.25157 8.86515 3.97378 9.43093 3.86124C9.99671 3.7487 10.5832 3.80646 11.1161 4.02722C11.6491 4.24797 12.1046 4.62181 12.4251 5.10145C12.7456 5.5811 12.9166 6.145 12.9166 6.72187C12.9166 7.49541 12.6093 8.23728 12.0623 8.78426C11.5154 9.33124 10.7735 9.63853 9.99994 9.63853ZM13.7499 13.8052C13.4184 13.8052 13.1005 13.6735 12.8661 13.4391C12.6316 13.2047 12.4999 12.8867 12.4999 12.5552C12.5021 12.2244 12.6345 11.9077 12.8685 11.6737C13.1024 11.4398 13.4191 11.3074 13.7499 11.3052C14.0815 11.3052 14.3994 11.4369 14.6338 11.6713C14.8682 11.9057 14.9999 12.2237 14.9999 12.5552C14.9999 12.8867 14.8682 13.2047 14.6338 13.4391C14.3994 13.6735 14.0815 13.8052 13.7499 13.8052Z" fill="#464255" />
                </svg>
            </div>
            <span class="-mr-1 " :class="{'block':showSide, 'hidden':!showSide}">System Logs</span>
        </a> -->
                <a href="{{ route('systemlogs') }}" aria-label="dashboard"
                    @class(['relative flex items-center gap-3 px-6 py-0 text-Primary font-medium', 'text-customGreen font-semibold'=> request()->routeIs('systemlogs')])
                    @mouseenter="toggle = true"
                    @mouseleave="toggle = false"
                    @click="setActiveTab('systemlogs'); show = false; showManage = false; subActiveItem = ''; setsubTmsActiveItem(''); setsettingsTmsActiveItem('')">
                    <div class="text-center p-[13px] rounded-full justify-center items-center flex"
                        :class="{'bg-customGreen-100': {{ request()->routeIs('systemlogs') ? 'true' : 'false' }}, 'bg-none': {{ !request()->routeIs('systemlogs') ? 'true' : 'false' }}}">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.9916 14.3969C16.4243 13.8804 16.663 13.229 16.6666 12.5552C16.6666 11.7817 16.3593 11.0398 15.8123 10.4928C15.2654 9.94582 14.5235 9.63853 13.7499 9.63853H13.5166C14.2038 8.82186 14.5815 7.78922 14.5833 6.72187C14.5852 5.95232 14.3934 5.19468 14.0254 4.5188C13.6575 3.84292 13.1253 3.27057 12.4779 2.85453C11.8305 2.43848 11.0888 2.19214 10.3211 2.13822C9.55346 2.0843 8.78458 2.22453 8.08539 2.54599C7.3862 2.86745 6.77921 3.35978 6.32038 3.97758C5.86156 4.59539 5.56568 5.31877 5.46003 6.08103C5.35437 6.84329 5.44235 7.61988 5.71585 8.33919C5.98934 9.05849 6.43954 9.69736 7.02494 10.1969C5.45017 10.7987 4.09496 11.8641 3.13829 13.2522C2.18162 14.6403 1.66847 16.286 1.66661 17.9719C1.66661 18.1929 1.75441 18.4048 1.91069 18.5611C2.06697 18.7174 2.27893 18.8052 2.49994 18.8052C2.72096 18.8052 2.93292 18.7174 3.0892 18.5611C3.24548 18.4048 3.33328 18.1929 3.33328 17.9719C3.33328 16.2038 4.03566 14.5081 5.2859 13.2578C6.53614 12.0076 8.23183 11.3052 9.99994 11.3052H11.1249C10.8808 11.8019 10.7871 12.359 10.8552 12.9082C10.9233 13.4575 11.1503 13.9748 11.5083 14.3969C10.7983 14.794 10.2071 15.3732 9.79551 16.0748C9.38391 16.7764 9.16682 17.5751 9.16661 18.3885C9.16661 18.6095 9.25441 18.8215 9.41069 18.9778C9.56697 19.1341 9.77893 19.2219 9.99994 19.2219C10.221 19.2219 10.4329 19.1341 10.5892 18.9778C10.7455 18.8215 10.8333 18.6095 10.8333 18.3885C10.8333 17.615 11.1406 16.8731 11.6875 16.3261C12.2345 15.7792 12.9764 15.4719 13.7499 15.4719C14.5235 15.4719 15.2654 15.7792 15.8123 16.3261C16.3593 16.8731 16.6666 17.615 16.6666 18.3885C16.6666 18.6095 16.7544 18.8215 16.9107 18.9778C17.067 19.1341 17.2789 19.2219 17.4999 19.2219C17.721 19.2219 17.9329 19.1341 18.0892 18.9778C18.2455 18.8215 18.3333 18.6095 18.3333 18.3885C18.3331 17.5751 18.116 16.7764 17.7044 16.0748C17.2928 15.3732 16.7015 14.794 15.9916 14.3969ZM9.99994 9.63853C9.42308 9.63853 8.85917 9.46747 8.37953 9.14699C7.89989 8.8265 7.52605 8.37098 7.3053 7.83803C7.08454 7.30507 7.02678 6.71863 7.13932 6.15285C7.25186 5.58707 7.52965 5.06737 7.93755 4.65947C8.34545 4.25157 8.86515 3.97378 9.43093 3.86124C9.99671 3.7487 10.5832 3.80646 11.1161 4.02722C11.6491 4.24797 12.1046 4.62181 12.4251 5.10145C12.7456 5.5811 12.9166 6.145 12.9166 6.72187C12.9166 7.49541 12.6093 8.23728 12.0623 8.78426C11.5154 9.33124 10.7735 9.63853 9.99994 9.63853ZM13.7499 13.8052C13.4184 13.8052 13.1005 13.6735 12.8661 13.4391C12.6316 13.2047 12.4999 12.8867 12.4999 12.5552C12.5021 12.2244 12.6345 11.9077 12.8685 11.6737C13.1024 11.4398 13.4191 11.3074 13.7499 11.3052C14.0815 11.3052 14.3994 11.4369 14.6338 11.6713C14.8682 11.9057 14.9999 12.2237 14.9999 12.5552C14.9999 12.8867 14.8682 13.2047 14.6338 13.4391C14.3994 13.6735 14.0815 13.8052 13.7499 13.8052Z" fill="#464255" />
                        </svg>
                    </div>
                    <span class="-mr-1" :class="{'block': showSide, 'hidden': !showSide}">System Logs</span>
                </a>
            </li>

            <li x-data="{toggle: false}">
                <a href="{{ route('report') }}" aria-label="dashboard" @class(['relative flex items-center gap-3 px-6 py-0 text-Primary font-medium', ' text-customGreen font-semibold'=> request()->routeIs('')]) @mouseenter="toggle = true" @mouseleave="toggle = false"
                    @click="setActiveTab('report'); show = false; showManage = false; subActiveItem = ''; setsubTmsActiveItem(''); setsettingsTmsActiveItem('')">
                    <div class=" text-center p-[13px] rounded-full justify-center items-center flex"
                        :class="{'bg-customGreen-100': {{ request()->routeIs('') ? 'true' : 'false' }}, 'bg-none': {{ !request()->routeIs('') ? 'true' : 'false' }}}">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5417 2.33855C10.3908 2.20946 10.1987 2.13853 10 2.13855H4.16671C3.94569 2.13855 3.73373 2.22635 3.57745 2.38263C3.42117 2.53891 3.33337 2.75087 3.33337 2.97188V17.9719C3.33337 18.1929 3.42117 18.4049 3.57745 18.5611C3.73373 18.7174 3.94569 18.8052 4.16671 18.8052H15.8334C16.0544 18.8052 16.2664 18.7174 16.4226 18.5611C16.5789 18.4049 16.6667 18.1929 16.6667 17.9719V7.97188C16.6667 7.85152 16.6406 7.73258 16.5903 7.62325C16.5399 7.51392 16.4665 7.41679 16.375 7.33855L10.5417 2.33855ZM10.8334 4.78022L13.5834 7.13855H10.8334V4.78022ZM15 17.1386H5.00004V3.80522H9.16671V7.97188C9.16671 8.1929 9.25451 8.40486 9.41079 8.56114C9.56707 8.71742 9.77903 8.80522 10 8.80522H15V17.1386Z" fill="#464255" />
                        </svg>
                    </div>
                    <span class="-mr-1 " :class="{'block':showSide, 'hidden':!showSide}">Reports</span>
                </a>
            </li>
        </ul>
    </div>
</div>