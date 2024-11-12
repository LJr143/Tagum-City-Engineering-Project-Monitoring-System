<div x-data="{
    open: localStorage.getItem('notificationModalOpen') === 'true',
    tab: 'all'
}"
     wire:poll.5s
     class="relative"
     x-init="$watch('open', value => localStorage.setItem('notificationModalOpen', value))">

    <div class="notification-bell cursor-pointer mr-2" wire:click="loadNotifications" @click="open = !open">
        <!-- Bell Icon with Notification Count -->
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 10C0 4.47715 4.47715 0 10 0H30C35.5228 0 40 4.47715 40 10V30C40 35.5228 35.5228 40 30 40H10C4.47715 40 0 35.5228 0 30V10Z" fill="#16A34A" fill-opacity="0.15"/>
            <path d="M13.3333 26.6667H18.3333C18.3333 27.1087 18.5089 27.5326 18.8215 27.8452C19.1341 28.1577 19.558 28.3333 20 28.3333C20.442 28.3333 20.866 28.1577 21.1785 27.8452C21.4911 27.5326 21.6667 27.1087 21.6667 26.6667H26.6667C26.8877 26.6667 27.0996 26.5789 27.2559 26.4226C27.4122 26.2663 27.5 26.0544 27.5 25.8333C27.5 25.6123 27.4122 25.4004 27.2559 25.2441C27.0996 25.0878 26.8877 25 26.6667 25V19.1667C26.6667 17.3986 25.9643 15.7029 24.714 14.4526C23.4638 13.2024 21.7681 12.5 20 12.5C18.2319 12.5 16.5362 13.2024 15.286 14.4526C14.0357 15.7029 13.3333 17.3986 13.3333 19.1667V25C13.1123 25 12.9004 25.0878 12.7441 25.2441C12.5878 25.4004 12.5 25.6123 12.5 25.8333C12.5 26.0544 12.5878 26.2663 12.7441 26.4226C12.9004 26.5789 13.1123 26.6667 13.3333 26.6667V26.6667ZM15 19.1667C15 17.8406 15.5268 16.5688 16.4645 15.6311C17.4021 14.6935 18.6739 14.1667 20 14.1667C21.3261 14.1667 22.5979 14.6935 23.5355 15.6311C24.4732 16.5688 25 17.8406 25 19.1667V25H15V19.1667Z" fill="#16A34A"/>
        </svg>
    </div>

    <!-- Notification Count Badge -->
    @if($count > 0)
        <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-1">
            {{ $count }}
        </span>
    @endif

    <!-- Notifications Dropdown -->
    <div x-show="open" class="absolute right-0 mt-2 w-80 bg-white shadow-lg rounded-lg overflow-hidden z-10">
        <div class="flex justify-between items-center p-4 border-b">
            <h2 class="text-lg font-semibold">Notifications</h2>
            <i class="fas fa-times cursor-pointer" @click="open = false"></i>
        </div>
        <div class="flex justify-between items-center px-4 py-2 border-b">
            <div class="flex space-x-4">
                <button @click="tab = 'all'; @this.call('toggleUnread')" :class="{'text-green-600 font-semibold border-b-2 border-green-600': tab === 'all', 'text-gray-500': tab !== 'all'}">All</button>
                <button @click="tab = 'unread'; @this.call('toggleUnread')" :class="{'text-green-600 font-semibold border-b-2 border-green-600': tab === 'unread', 'text-gray-500': tab !== 'unread'}">Unread</button>
            </div>
            <button wire:click="loadNotifications" class="text-gray-500 text-sm">Mark all read</button>
        </div>
        <div class="p-4">
            @if($notifications && $notifications->count() > 0)
                @foreach ($notifications as $notification)
                    <div class="notification p-3 border-b border-gray-200">
                        <h4 class="font-semibold">Notification Title</h4>
                        <p class="text-sm text-gray-600">{{ $notification->data['message'] ?? 'No message available' }}</p>
                        <p class="text-xs text-gray-400">{{ $notification->created_at->format('F j, Y, g:i a') }}</p>
                        <div class="flex justify-between items-center mt-2">
                            @if(!$notification->read_at)
                                <span class="text-green-600"><i class="fas fa-circle"></i></span>
                            @endif
                            <i class="fas fa-chevron-right text-gray-400"></i>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="notification p-3 text-center text-gray-500 text-[12px]">
                    No notifications
                </div>
            @endif
        </div>
    </div>
</div>
