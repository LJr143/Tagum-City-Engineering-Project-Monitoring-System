<?php

namespace App\Livewire;

use Livewire\Component;

class NotificationBell extends Component
{
    public $notifications;
    public $count = 0;
    public $showUnread = false; // Track if unread-only mode is active

    protected $listeners = ['notificationAdded' => 'loadNotifications'];

    public function mount()
    {
        $this->loadNotifications();
    }

    public function loadNotifications(): void
    {
        // Fetch notifications based on $showUnread
        $query = auth()->user()->notifications();

        if ($this->showUnread) {
            $query->unread();
        }

        $this->notifications = $query->get();
        $this->count = auth()->user()->notifications()->unread()->count();
    }

    public function toggleUnread()
    {
        $this->showUnread = !$this->showUnread;
        $this->loadNotifications(); // Reload notifications based on unread status
    }

    public function markAsRead($notificationId)
    {
        $notification = auth()->user()->notifications()->findOrFail($notificationId);
        $notification->markAsRead();
        $this->loadNotifications();
    }

    public function render()
    {
        return view('livewire.notification-bell');
    }
}
