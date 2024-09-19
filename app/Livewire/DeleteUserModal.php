<?php

namespace App\Livewire;

use Livewire\Component;

class DeleteUserModal extends Component
{
    public $isOpen = false;

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function deleteUser()
    {
        // Add user deletion logic here
        session()->flash('message', 'User deleted successfully.');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.delete-user-modal');
    }
}
