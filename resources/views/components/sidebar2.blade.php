<div class="h-[85px] justify-between items-center px-1 hidden lg:flex transform ease-in-out transition"
     :class="{'w-[240px]':showSide, 'w-[100px]':!showSide}">

    <div class="mt-10" :class="{'block':showSide, 'hidden':!showSide}">
        <img src="{{ asset('storage/pmsAssets/pms_logo.png') }}" class="h-30 w-40 ml-1.5" alt="logo">
    </div>
    <button @click="showSide = ! showSide; show = false; showManage = false"
            :class="{'hover:bg-customGreen-50 focus:bg-customGreen-100':showSide, 'bg-customGreen-100':!showSide}" class="p-3 ml-2 rounded-xl">
        <svg class="transform ease-in-out transition" :class="{'rotate-180':!showSide,'rotate-0':showSide}" width="12"
             height="10" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.17742 13.3548L1 7.17742L7.17742 1" stroke="rgba(36, 144, 0, 1)" stroke-width="1.90074"
                  stroke-linecap="round" stroke-linejoin="round" />
            <path d="M15.731 12.4045L10.5039 7.17743L15.731 1.95038" stroke="rgba(36, 144, 0, 0.8)" stroke-opacity="0.45"
                  stroke-width="1.50476" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>
</div>
{{-- NAVIGATION BUTTONS --}}
<div class="hidden w-full max-w-[240px] lg:flex flex-col justify-between pt-2 pb-10 flex-1 overflow-y-auto">
    <div class="text-sm">
        <ul class="mt-10 space-y-1 tracking-wide">
            <li x-data="{toggle: false}" @mouseenter="toggle = true"
                @mouseleave="toggle = false"
                :style="toggle ? 'background-color: rgba(36, 144, 0, 0.3);' : ''">
                <a href="{{ route('dashboard') }}" @if (request()->routeIs('dashboard')){ @click.prevent="preventAction = true" }@endif aria-label="dashboard" @class(['relative flex items-center gap-3 px-6 py-0 text-Primary font-medium', ' text-customGreen font-semibold'=> request()->routeIs('dashboard')]) @mouseenter="toggle = true" @mouseleave="toggle = false"
                   @click="setActiveTab('dashboard'); show = false; showManage = false; subActiveItem = ''; setsubTmsActiveItem(''); setsettingsTmsActiveItem('')">
                    <div class=" text-center px-[13px] py-[10px] rounded-full justify-center items-center flex"
                         :class="{'bg-customGreen-100': {{ request()->routeIs('dashboard') ? 'true' : 'false' }}, 'bg-none': {{ !request()->routeIs('dashboard') ? 'true' : 'false' }}}">
                        <svg width="15" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.47292 2.47192C2.81715 2.47192 2 3.28908 2 5.94484C2 8.6006 2.81715 9.41776 5.47292 9.41776C8.12868 9.41776 8.94583 8.6006 8.94583 5.94484C8.94583 3.28908 8.12868 2.47192 5.47292 2.47192Z" stroke="#3F3E44" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5.47292 12.196C2.81715 12.196 2 13.0132 2 15.669C2 18.3247 2.81715 19.1419 5.47292 19.1419C8.12868 19.1419 8.94583 18.3247 8.94583 15.669C8.94583 13.0132 8.12868 12.196 5.47292 12.196Z" stroke="#3F3E44" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15.1971 12.196C12.5414 12.196 11.7242 13.0132 11.7242 15.669C11.7242 18.3247 12.5414 19.1419 15.1971 19.1419C17.8528 19.1419 18.67 18.3247 18.67 15.669C18.67 13.0132 17.8528 12.196 15.1971 12.196Z" stroke="#3F3E44" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15.1971 2.47192C12.5414 2.47192 11.7242 3.28908 11.7242 5.94484C11.7242 8.6006 12.5414 9.41776 15.1971 9.41776C17.8528 9.41776 18.67 8.6006 18.67 5.94484C18.67 3.28908 17.8528 2.47192 15.1971 2.47192Z" stroke="#3F3E44" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <span class="mr-1" :class="{'block':showSide, 'hidden':!showSide}" style="font-size: 12px">Dashboard</span>
                </a>
            </li>

            <li x-data="{toggle: false}" @mouseenter="toggle = true"
                @mouseleave="toggle = false"
                :style="toggle ? 'background-color: rgba(36, 144, 0, 0.3);' : ''">
                <a href="{{ route('project-main') }}" @if (request()->routeIs('project-main')){ @click.prevent="preventAction = true" }@endif" aria-label="project" @class(['relative flex items-center gap-3 px-6 py-0 text-Primary font-medium', ' text-customGreen font-semibold'=> request()->routeIs('project-main')]) @mouseenter="toggle = true" @mouseleave="toggle = false"
                @click="setActiveTab(''); show = false; showManage = false; subActiveItem = ''; setsubTmsActiveItem(''); setsettingsTmsActiveItem('')">
                <div class=" text-center px-[13px] py-[10px] rounded-full justify-center items-center flex"
                     :class="{'bg-customGreen-100': {{ request()->routeIs('project-main') ? 'true' : 'false' }}, 'bg-none': {{ !request()->routeIs('project-main') ? 'true' : 'false' }}}">
                    <svg width="15" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.51699 3.11139L3.02533 6.61139C2.27533 7.19472 1.66699 8.43639 1.66699 9.37806V15.5531C1.66699 17.4864 3.24199 19.0697 5.17533 19.0697H14.8253C16.7587 19.0697 18.3337 17.4864 18.3337 15.5614V9.49472C18.3337 8.48639 17.6587 7.19472 16.8337 6.61972L11.6837 3.01139C10.517 2.19472 8.64199 2.23639 7.51699 3.11139Z" stroke="#3F3E44" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10 15.7365V13.2365" stroke="#3F3E44" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </div>
                <span class="-mr-1 " :class="{'block':showSide, 'hidden':!showSide}" style="font-size: 12px">Projects</span>
                </a>
            </li>


            <li x-data="{toggle: false}" @mouseenter="toggle = true"
                @mouseleave="toggle = false"
                :style="toggle ? 'background-color: rgba(36, 144, 0, 0.3);' : ''">
                <a href="" aria-label="dashboard" @class(['relative flex items-center gap-3 px-6 py-0 text-Primary font-medium', ' text-customGreen font-semibold'=> request()->routeIs('')]) @mouseenter="toggle = true" @mouseleave="toggle = false"
                   @click="setActiveTab(''); show = false; showManage = false; subActiveItem = ''; setsubTmsActiveItem(''); setsettingsTmsActiveItem('')">
                    <div class=" text-center px-[13px] py-[10px] rounded-full justify-center items-center flex"
                         :class="{'bg-customGreen-100': {{ request()->routeIs('') ? 'true' : 'false' }}, 'bg-none': {{ !request()->routeIs('') ? 'true' : 'false' }}}">
                        <svg width="15" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5417 2.33855C10.3908 2.20946 10.1987 2.13853 10 2.13855H4.16671C3.94569 2.13855 3.73373 2.22635 3.57745 2.38263C3.42117 2.53891 3.33337 2.75087 3.33337 2.97188V17.9719C3.33337 18.1929 3.42117 18.4049 3.57745 18.5611C3.73373 18.7174 3.94569 18.8052 4.16671 18.8052H15.8334C16.0544 18.8052 16.2664 18.7174 16.4226 18.5611C16.5789 18.4049 16.6667 18.1929 16.6667 17.9719V7.97188C16.6667 7.85152 16.6406 7.73258 16.5903 7.62325C16.5399 7.51392 16.4665 7.41679 16.375 7.33855L10.5417 2.33855ZM10.8334 4.78022L13.5834 7.13855H10.8334V4.78022ZM15 17.1386H5.00004V3.80522H9.16671V7.97188C9.16671 8.1929 9.25451 8.40486 9.41079 8.56114C9.56707 8.71742 9.77903 8.80522 10 8.80522H15V17.1386Z" fill="#464255"/>
                        </svg>
                    </div>
                    <span class="-mr-1 " :class="{'block':showSide, 'hidden':!showSide}" style="font-size: 12px">Reports</span>
                </a>
            </li>


        </ul>


        {{--                <!-- Hidden Logout Form -->--}}
        {{--                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
        {{--                    @csrf--}}
        {{--                </form>--}}
        {{--            </li>--}}
        {{--        </ul>--}}

    </div>
</div>
