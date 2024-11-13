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
        // Fetch all notifications for the logged-in user
        $this->notifications = auth()->user()->notifications()->get();

        // Update unread notification count
        $this->count = auth()->user()->notifications()->unread()->count();

        $this->notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->get();
    }

    public function showUnreadNotifications()
    {
        // Load only unread notifications
        $this->notifications = auth()->user()->notifications()->unread()->get();
    }

    public function showAllNotifications()
    {
        // Load all notifications
        $this->notifications = auth()->user()->notifications()->get();
    }

    public function markAsRead($notificationId)
    {
        // Mark a specific notification as read
        $notification = auth()->user()->notifications()->findOrFail($notificationId);
        $notification->markAsRead();

        // Refresh the notifications after marking as read
        $this->loadNotifications();
    }

    public function markAllAsRead()
    {
        // Mark all unread notifications as read
        auth()->user()->unreadNotifications->markAsRead();

        // Refresh the notifications and count
        $this->loadNotifications();
    }

    public function render()
    {
        return view('livewire.notification-bell');
    }
}
