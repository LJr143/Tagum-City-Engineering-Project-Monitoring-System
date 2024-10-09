<?php

namespace App\Livewire;

use App\Services\LogService;
use Livewire\Component;
use App\Models\User; // Ensure you have imported your User model
use Illuminate\Support\Facades\Hash;

class AddUser extends Component
{
    public $first_name;
    public $last_name;
    public $middle_initial;
    public $gender;
    public $birth_date;
    public $email;
    public $contact_number;
    public $position;
    public $role;
    public $password;
    public $password_confirmation; // New property for password confirmation

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'middle_initial' => 'required|string|max:2',
        'gender' => 'required|string|max:25',
        'birth_date' => 'required|date',
        'email' => 'required|string|email|max:255|unique:users,email',
        'contact_number' => 'required|string|max:255|unique:users,contact_number',
        'position' => 'required|string|max:255',
        'role' => 'required|string|max:255',
        'password' => 'required|min:8|confirmed', // Ensure password is confirmed
    ];

    public function submit()
    {
        $this->validate();

        // Create a new user
        User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'middle_initial' => $this->middle_initial,
            'gender' => $this->gender,
            'birth_date' => $this->birth_date,
            'email' => $this->email,
            'contact_number' => $this->contact_number,
            'position' => $this->position,
            'role' => $this->role,
            'password' => Hash::make($this->password), // Hash the password
        ]);

        LogService::logAction(
            'added User',
            "Added User : {$this->first_name} {$this->last_name}",
            auth()->id()
        );

        // Reset the form fields
        $this->reset();

        // Emit an event to notify that a user has been added
        $this->dispatch('user-added');
    }

    public function render()
    {
        return view('livewire.add-user');
    }
}
