<?php

namespace App\Livewire;

use App\Models\User;
use App\Services\LogService;
use Livewire\Component;

class DeleteUser extends Component
{
    public $userId;
    public $confirming = false;

    public function confirmDelete()
    {
        if ($this->userId) {
            $user = User::find($this->userId);
            if ($user) {
                $user->delete();
                session()->flash('success', 'User deleted successfully.');
            } else {
                session()->flash('error', 'User not found.');
            }
        }
        $this->confirming = false;
        LogService::logAction(
            'deleted user',
            "deleted user with id: {$this->userId}",
            auth()->id()
        );
        $this->dispatch('user-deleted');
    }

    public function render()
    {
        return view('livewire.delete-user');
    }
}
