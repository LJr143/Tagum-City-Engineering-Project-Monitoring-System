<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

// class AccountSettings extends Component
// {
//     use WithFileUploads;

//     public $profileImage;
//     public $defaultProfileImage = 'storage/app/public/pmsAssets/default.png';
//     public $name;
//     public $birthdate;
//     public $age;
//     public $phoneNumber;
//     public $email;
//     public $userID;
//     public $currentPassword;
//     public $newPassword;
//     public $confirmNewPassword;

//     protected $rules = [
//         'name' => 'required|string|max:255',
//         'birthdate' => 'required|date',
//         'phoneNumber' => 'nullable|string|max:20',
//         'email' => 'required|email|max:255|unique:users,email,' . 'userID', // Ignoring current user
//         'profileImage' => 'nullable|image|max:1024',
//         'newPassword' => 'nullable|min:8|same:confirmNewPassword',
//     ];

//     public function mount()
//     {
//         $user = Auth::user();
//         $this->userID = $user->id;
//         $this->name = $user->first_name . ' ' . ($user->middle_initial ?? '') . ' ' . $user->last_name;
//         $this->birthdate = $user->birth_date;
//         $this->phoneNumber = $user->contact_number;
//         $this->email = $user->email;
//     }

//     public function updatedProfileImage()
//     {
//         $this->validateOnly('profileImage');
//     }

//     public function saveChanges()
//     {
//         $this->validate();

//         $user = User::find($this->userID);

//         if ($this->profileImage) {
//             $imageName = $this->profileImage->store('profile-images', 'public');
//             $user->profile_photo_path = $imageName;
//         }

//         $nameParts = explode(' ', $this->name);
//         $user->first_name = $nameParts[0];
//         $user->middle_initial = $nameParts[1] ?? null;
//         $user->last_name = end($nameParts);

//         $user->birth_date = $this->birthdate;
//         $user->contact_number = $this->phoneNumber;
//         $user->email = $this->email;

//         $user->save();

//         session()->flash('message', 'Account settings updated successfully.');
//     }

//     public function updateAccount()
//     {
//         $this->validate([
//             'currentPassword' => 'required',
//             'newPassword' => 'required|min:8|same:confirmNewPassword',
//         ]);

//         $user = User::find($this->userID);

//         if (!Hash::check($this->currentPassword, $user->password)) {
//             session()->flash('error', 'Current password does not match.');
//             return;
//         }

//         $user->password = Hash::make($this->newPassword);
//         $user->save();

//         session()->flash('message', 'Password updated successfully.');
//     }

//     public function render()
//     {
//         return view('livewire.account-settings', [
//             'profileImageUrl' => $this->profileImage ? $this->profileImage->temporaryUrl() : ($this->defaultProfileImage ?? $this->user->profile_photo_url),
//         ]);
//     }
// }

class AccountSettings extends Component
{
    use WithFileUploads;

    public $user;
    public $profileImage;
    public $profilePhotoPath;
    public $defaultProfileImage = 'storage/app/public/pmsAssets/default.png'; // default image path
    // public $name;
    public $first_name;
    public $middle_initial;
    public $last_name;
    public $birthdate;
    public $age;
    public $phoneNumber;
    public $email;
    public $userID;
    public $currentPassword;
    public $newPassword;
    public $confirmNewPassword;

    protected function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'middle_initial' => 'nullable|string|max:1',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'phoneNumber' => 'nullable|string|max:20',
            'email' => 'required|email|max:255|unique:users,email,' . $this->userID,
            'profileImage' => 'nullable|image|max:1024',
            'newPassword' => 'nullable|min:8|same:confirmNewPassword',
        ];
    }

    public function mount()
    {
        $user = Auth::user();
        $this->userID = $user->id;
        $this->first_name = $user->first_name;
        $this->middle_initial = $user->middle_initial;
        $this->last_name = $user->last_name;
        $this->birthdate = $user->birth_date;
        $this->age = $this->calculateAge($user->birth_date);
        $this->phoneNumber = $user->contact_number;
        $this->email = $user->email;
        $this->profilePhotoPath = User::find($this->userID)->profile_photo_path;
    }

    // Calculate age from birthdate
    private function calculateAge($birthdate)
    {
        return \Carbon\Carbon::parse($birthdate)->age;
    }

    public function updatedProfileImage()
    {
        $this->validateOnly('profileImage');
    }

    public function saveChanges()
    {

        $this->validate();

        $user = User::find($this->userID);

        if ($this->profileImage) {
            $imageName = $this->profileImage->store('profile-images', 'public');
            $user->profile_photo_path = $imageName;
            $this->profilePhotoPath = $imageName;
        }

        $user->first_name = $this->first_name;
        $user->middle_initial = $this->middle_initial;
        $user->last_name = $this->last_name;
        $user->birth_date = $this->birthdate;
        $user->contact_number = $this->phoneNumber;
        $user->email = $this->email;

        $user->save();

        session()->flash('message', 'Account settings updated successfully.');
    }

    public function updateAccount()
    {
        $this->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8|same:confirmNewPassword',
        ]);

        $user = User::find($this->userID);

        if (!Hash::check($this->currentPassword, $user->password)) {
            session()->flash('error', 'Current password does not match.');
            return;
        }

        $user->password = Hash::make($this->newPassword);
        $user->save();

        session()->flash('message', 'Password updated successfully.');
    }

    public function render()
    {
        return view('livewire.account-settings', [
            'user' => $this->user,
            'profileImageUrl' => $this->profileImage ? $this->profileImage->temporaryUrl() : ($this->defaultProfileImage ?? $this->user->profile_photo_url),
        ]);
    }
}
