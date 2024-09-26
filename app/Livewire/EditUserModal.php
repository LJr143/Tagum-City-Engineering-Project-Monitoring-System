<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;

class EditUserModal extends Component
{
public $userId;
public $name;
public $email;
public $birthdate;
public $age;
public $position;
public $role;
public $positions = ['Manager', 'Developer', 'Designer'];
public $roles = ['Admin', 'user', 'Guest'];
public $isModalOpen = false;

protected $rules = [
'name' => 'required|string|max:255',
'email' => 'required|email',
'birthdate' => 'required|date|before:today',
'age' => 'required|integer|min:20',
'position' => 'required|string',
'role' => 'required|string',
];

public function openModal($userId = null)
{
$this->resetErrorBag();
$this->resetFormFields();

if ($userId) {
$user = User::find($userId);
$this->userId = $user->id;
$this->name = $user->name;
$this->email = $user->email;
$this->birthdate = $user->birthdate;
$this->age = Carbon::parse($this->birthdate)->age;
$this->position = $user->position;
$this->role = $user->role;
}

$this->isModalOpen = true;
}

public function closeModal()
{
$this->isModalOpen = false;
}

public function resetFormFields()
{
$this->userId = null;
$this->name = '';
$this->email = '';
$this->birthdate = '';
$this->age = '';
$this->position = '';
$this->role = '';
}

public function saveUser()
{
$this->validate();

User::updateOrCreate(
['id' => $this->userId],
[
'name' => $this->name,
'email' => $this->email,
'birthdate' => $this->birthdate,
'position' => $this->position,
'role' => $this->role,
]
);

$this->closeModal();
}

public function render()
{
return view('livewire.edit-user-modal');
}
}
