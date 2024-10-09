<?php

namespace App\Livewire;

use AllowDynamicProperties;
use App\Services\LogService;
use Livewire\Component;
use App\Models\User;

class EditUser extends Component
{
    public $user_id;
    public $first_name, $last_name, $middle_initial, $gender, $birth_date, $email, $contact_number, $position, $role;

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'middle_initial' => 'required|string|max:2',
        'gender' => 'required|string|max:25',
        'birth_date' => 'required|date',
        'email' => 'required|string|email|max:255',
        'contact_number' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'role' => 'required|string|max:255',
    ];

    public function mount($userId)
    {
        $this->user_id = $userId; // Store user ID for later use
        $user = User::find($userId);

        if ($user) {
            $this->first_name = $user->first_name;
            $this->last_name = $user->last_name;
            $this->middle_initial = $user->middle_initial;
            $this->gender = $user->gender;
            $this->birth_date = $user->birth_date;
            $this->email = $user->email;
            $this->contact_number = $user->contact_number;
            $this->position = $user->position;
            $this->role = $user->role;
        }
    }


    public function submit()
    {
        $this->validate();

        try {
            $user = User::find($this->user_id);

            if ($user) {
                $user->update([
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'middle_initial' => $this->middle_initial,
                    'gender' => $this->gender,
                    'birth_date' => $this->birth_date,
                    'contact_number' => $this->contact_number,
                    'position' => $this->position,
                    'role' => $this->role,
                ]);

                $this->reset();

                session()->flash('message', 'User updated successfully.');
                LogService::logAction(
                    'edited user',
                    "Edited User with user id: {$this->user_id}",
                    auth()->id()
                );
                $this->dispatch('user-edited');
                return redirect()->route('manage-user');

            }
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while updating the user: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}
