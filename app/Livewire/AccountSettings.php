<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
    public $role;
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
            'profileImage' => 'nullable|image|max:10240',
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

        $xsd = User::where('id', '=', Auth::user()->id)->pluck('role');
        $this->role = $xsd[0];
    }

    private function calculateAge($birthdate)
    {
        return \Carbon\Carbon::parse($birthdate)->age;
    }

    public function updatedProfileImage()
    {
        $this->validateOnly('profileImage');
    }

    public function saveProfile()
    {
        $user = auth()->user();

        // Validate input
        $this->validate([
            'first_name' => 'required|string|max:255',
            'middle_initial' => 'nullable|string|max:1',
            'last_name' => 'required|string|max:255',
            'profileImage' => 'nullable|image|max:1024', // 1MB max
        ]);

        // Update profile image if provided
        if ($this->profileImage) {
            $path = $this->profileImage->store('profile-images', 'public');
            $user->profile_image = $path;
        }

        // Update user details
        $user->first_name = $this->first_name;
        $user->middle_initial = $this->middle_initial;
        $user->last_name = $this->last_name;

        // Check if 'role' is provided
        if ($this->role) {
            $user->role = $this->role;
        }

        // Save the changes
        $user->save();

        // Flash a success message
        session()->flash('message', 'Profile updated successfully.');
    }

    public function savePersonalInfo()
    {
        $user = User::find($this->userID);

        // dd($user);

        // // Validate input
        // $this->validate([
        //     'first_name' => 'required|string|max:255',
        //     'middle_initial' => 'nullable|string|max:1',
        //     'last_name' => 'required|string|max:255',
        //     'birthdate' => 'required|date|before:today',
        // ]);

        // Update personal information
        $user->first_name = $this->first_name;
        $user->middle_initial = $this->middle_initial;
        $user->last_name = $this->last_name;
        $user->birth_date = $this->birthdate;
        $user->save();

        dd($user->first_name);
        // $user->save();

        session()->flash('message', 'Personal information updated successfully.');
    }
    public function saveContactInfoChanges()
    {
        $user = User::find($this->userID);

        // Validate input
        // $this->validate([
        //     'email' => 'required|email|max:255',
        //     'phoneNumber' => 'nullable|string|regex:/^09[0-9]{9}$/',
        // ]);

        // Update contact information
        $user->email = $this->email;
        $user->contact_number = $this->phoneNumber;
        $user->save();

        session()->flash('message', 'Contact information updated successfully.');
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
