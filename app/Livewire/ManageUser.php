<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class ManageUser extends Component
{
    public $users;
    public $name;
    public $email;
    public $birthdate;
    public $age;
    public $position;
    public $role;
    public $userId;
    public $addModalOpen = false;
    public $editModalOpen = false;
    public $deleteModalOpen = false;

    public function render()
    {
        $this->users = User::paginate(10);
        return view('livewire.user-table');
    }

    public function saveUser()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'birthdate' => 'required',
            'age' => 'required',
            'position' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'birthdate' => $this->birthdate,
            'age' => $this->age,
            'position' => $this->position,
            'role' => $this->role,
        ]);

        $this->reset();
        $this->addModalOpen = false;
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'birthdate' => 'required',
            'age' => 'required',
            'position' => 'required',
            'role' => 'required',
        ]);

        $user = User::find($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'birthdate' => $this->birthdate,
            'age' => $this->age,
            'position' => $this->position,
            'role' => $this->role,
        ]);

        $this->reset();
        $this->editModalOpen = false;
    }

    public function deleteUser()
    {
        $user = User::find($this->userId);
        $user->delete();

        $this->reset();
        $this->deleteModalOpen = false;
    }

    public function calculateAddAge()
    {
        $this->age = date_diff(date_create($this->birthdate), date_create('now'))->y;
    }

    public function calculateEditAge()
    {
        $this->age = date_diff(date_create($this->birthdate), date_create('now'))->y;
    }

    public function openAddModal()
    {
        $this->addModalOpen = true;
    }

    public function closeAddModal()
    {
        $this->addModalOpen = false;
    }

    public function openEditModal($id)
    {
        $this->editModalOpen = true;
        $this->userId = $id;
        $user = User::find($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->birthdate = $user->birthdate;
        $this->age = $user->age;
        $this->position = $user->position;
        $this->role = $user->role;
    }

    public function closeEditModal()
    {
        $this->editModalOpen = false;
    }

    public function openDeleteModal($id)
    {
        $this->deleteModalOpen = true;
        $this->userId = $id;
        $user = User::find($id);
        $this->name = $user->name;
    }

    public function closeDeleteModal()
    {
        $this->deleteModalOpen = false;
    }
}
