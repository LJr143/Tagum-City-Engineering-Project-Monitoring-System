<?php
namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class AddUserModal extends Component
{
public $name;
public $email;
public $birthdate;
public $age;
public $position;
public $role;
public $positions = ['Manager', 'Developer', 'Designer'];
public $roles = ['Admin', 'User', 'Guest'];
public $isModalOpen = false;

protected $rules = [
'name' => 'required|string|max:255',
'email' => 'required|email',
'birthdate' => 'required|date|before:today',
'age' => 'required|integer|min:20',
'position' => 'required|string',
'role' => 'required|string',
];

public function updated($propertyName)
{
if ($propertyName === 'birthdate') {
    $this->validateBirthdate();
    $this->calculateAge(); // Call calculateAge method
}
$this->validateOnly($propertyName);
}


public function validateBirthdate()
{
$this->validateOnly('birthdate');

$birthdate = Carbon::parse($this->birthdate);
$today = Carbon::today();
$twentyYearsAgo = $today->copy()->subYears(20);

if ($birthdate->greaterThanOrEqualTo($today)) {
$this->addError('birthdate', 'The birthdate must be before today.');
$this->age = null; // Reset age if not valid
} else if ($birthdate->greaterThan($twentyYearsAgo)) {
$this->addError('birthdate', 'You must be at least 20 years old.');
$this->age = null; // Reset age if not valid
} else {
$this->calculateAge();
}
}

public function calculateAge()
{
    $birthdate = Carbon::parse($this->birthdate);
    $this->age = $birthdate->diff(Carbon::today())->y;
}

public function openModal()
{
$this->resetFormFields();
$this->resetValidation();
$this->isModalOpen = true;
}

public function closeModal()
{
$this->isModalOpen = false;
$this->resetValidation();
}

public function resetFormFields()
{
$this->name = '';
$this->email = '';
$this->birthdate = '';
$this->age = null;
$this->position = '';
$this->role = '';
}

public function saveUser()
{
$this->validate();

// Additional checks can be added here if necessary
$this->resetFormFields();
$this->closeModal();

session()->flash('success', 'User added successfully!');
}

public function render()
{
return view('livewire.add-user-modal');
}
}
