<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NotificationBell extends Component
{
    public $notifications;
    public $count = 0;

    protected $listeners = ['notificationAdded' => 'loadNotifications'];

    public function mount()
    {
        $this->loadNotifications();
    }

    public function loadNotifications(): void
    {
        // Fetch the notifications for the logged-in user
        $this->notifications = auth()->user()->notifications()->unread()->get();

        // Update notification count
        $this->count = $this->notifications->count();
    }


    public function markAsRead($notificationId)
    {
        // Mark a specific notification as read
        $notification = auth()->user()->notifications()->findOrFail($notificationId);
        $notification->markAsRead();

        // Refresh the notifications after marking as read
        $this->loadNotifications();
    }


    public function render()
    {
        return view('livewire.notification-bell');
    }
}
