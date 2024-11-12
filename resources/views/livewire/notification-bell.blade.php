<div x-data="{ open: false }" wire:poll.5s class="relative">
    <!-- Notification Bell Icon -->
    <div class="notification-bell cursor-pointer mr-2" wire:click="loadNotifications" @click="open = !open">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">

            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 10C0 4.47715 4.47715 0 10 0H30C35.5228 0 40 4.47715 40 10V30C40 35.5228 35.5228 40 30 40H10C4.47715 40 0 35.5228 0 30V10Z" fill="#16A34A" fill-opacity="0.15"/>
                <path d="M13.3333 26.6667H18.3333C18.3333 27.1087 18.5089 27.5326 18.8215 27.8452C19.1341 28.1577 19.558 28.3333 20 28.3333C20.442 28.3333 20.866 28.1577 21.1785 27.8452C21.4911 27.5326 21.6667 27.1087 21.6667 26.6667H26.6667C26.8877 26.6667 27.0996 26.5789 27.2559 26.4226C27.4122 26.2663 27.5 26.0544 27.5 25.8333C27.5 25.6123 27.4122 25.4004 27.2559 25.2441C27.0996 25.0878 26.8877 25 26.6667 25V19.1667C26.6667 17.3986 25.9643 15.7029 24.714 14.4526C23.4638 13.2024 21.7681 12.5 20 12.5C18.2319 12.5 16.5362 13.2024 15.286 14.4526C14.0357 15.7029 13.3333 17.3986 13.3333 19.1667V25C13.1123 25 12.9004 25.0878 12.7441 25.2441C12.5878 25.4004 12.5 25.6123 12.5 25.8333C12.5 26.0544 12.5878 26.2663 12.7441 26.4226C12.9004 26.5789 13.1123 26.6667 13.3333 26.6667V26.6667ZM15 19.1667C15 17.8406 15.5268 16.5688 16.4645 15.6311C17.4021 14.6935 18.6739 14.1667 20 14.1667C21.3261 14.1667 22.5979 14.6935 23.5355 15.6311C24.4732 16.5688 25 17.8406 25 19.1667V25H15V19.1667Z" fill="#16A34A"/>
            </svg>

          </svg>

        <!-- Notification Badge -->
        @if($count > 0)
            <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-1">
                {{ $count }}
            </span>
        @endif
    </div>

    <!-- Notifications Dropdown -->
    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute right-0 mt-2 w-80 bg-white shadow-lg rounded-lg overflow-hidden z-10">
        @if($notifications && $notifications->count() > 0)
            @foreach ($notifications as $notification)
                <div class="notification p-3 border-b border-gray-200">
                    <p class="text-[12px]">
                        <span class="font-medium">Project Title:</span>
                        {{ $notification->data['project_title'] ?? 'No title available' }}<br>
                    </p>
                    @if(isset($notification->data['project_id']))
                        <a href="{{ url('/projects/' . $notification->data['project_id']) }}" class="text-blue-500 text-xs">View Project</a>
                    @else
                        <span class="text-gray-500 text-xs">No project link available</span>
                    @endif

                    <button wire:click="markAsRead('{{ $notification->id }}')" class="text-[12px] text-gray-500 ml-2">Mark as read</button>
                </div>
            @endforeach
        @else
            <div class="notification p-3 text-center text-gray-500 text-[12px]">
                No notifications
            </div>
        @endif
    </div>
</div>
