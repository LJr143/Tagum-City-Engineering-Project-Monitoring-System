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

    public $activeTab = 'profile'; // Tracks active tab: 'profile', 'personal', 'contact', 'password'

    // Common user details
    public $userID;
    public $role;
    public $profileImage;
    public $defaultProfileImage = 'storage/app/public/pmsAssets/default.png';

    // Profile fields
    public $first_name;
    public $middle_initial;
    public $last_name;

    // Personal information fields
    public $birthdate;
    public $age;

    // Contact information fields
    public $email;
    public $phoneNumber;

    // Password fields
    public $currentPassword;
    public $newPassword;
    public $confirmNewPassword;
    public $profilePhotoUrl;

    public function mount()
    {
        $user = Auth::user();

        $this->userID = $user->id;
        $this->first_name = $user->first_name;
        $this->middle_initial = $user->middle_initial;
        $this->last_name = $user->last_name;
        $this->birthdate = $user->birth_date;
        $this->age = $this->calculateAge($user->birth_date);
        $this->email = $user->email;
        $this->phoneNumber = $user->contact_number;
        $this->role = $user->role;

        $this->profilePhotoUrl = asset('storage/' . (auth()->user()->profile_photo_path)) ?? asset('storage/pmsAssets/default.png');
    }

    private function calculateAge($birthdate): int
    {
        return \Carbon\Carbon::parse($birthdate)->age;
    }

    public function updatedProfileImage()
    {
        // Handle image preview when file is uploaded
        if ($this->profileImage) {
            $this->profilePhotoUrl = $this->profileImage->temporaryUrl();
        }
    }

    public function saveProfile()
    {
        // Validate the uploaded image
        $this->validate([
            'profileImage' => 'nullable|image|max:1024',
        ]);

        $user = User::find(auth()->user()->id); // Use auth()->user() instead of $this->userID

        if ($this->profileImage) {
            // Store the image in 'public' storage and save the path in the user record
            $path = $this->profileImage->store('profile-images', 'public');
            $user->profile_photo_path = $path;
        }

        $user->save();

        $this->profilePhotoUrl = auth()->user()->profile_photo_url;

        // Show a success message
        session()->flash('message', 'Profile updated successfully.');
    }

    public function savePersonalInfo(): void
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'middle_initial' => 'nullable|string|max:1',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date|before:today',
        ]);

        $user = User::find($this->userID);
        $user->first_name = $this->first_name;
        $user->middle_initial = $this->middle_initial;
        $user->last_name = $this->last_name;
        $user->birth_date = $this->birthdate;
        $user->save();

        $this->age = $this->calculateAge($this->birthdate);
        session()->flash('message', 'Personal information updated successfully.');
    }

    public function saveContactInfo()
    {
        $this->validate([
            'email' => 'required|email|max:255|unique:users,email,' . $this->userID,
            'phoneNumber' => 'nullable|string|regex:/^09[0-9]{9}$/',
        ]);

        $user = User::find($this->userID);
        $user->email = $this->email;
        $user->contact_number = $this->phoneNumber;
        $user->save();

        session()->flash('message', 'Contact information updated successfully.');
    }

    public function updatePassword()
    {
        $this->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8|same:confirmNewPassword',
        ]);

        $user = User::find($this->userID);

        if (!Hash::check($this->currentPassword, $user->password)) {
            session()->flash('error', 'Current password is incorrect.');
            return;
        }

        $user->password = Hash::make($this->newPassword);
        $user->save();

        session()->flash('message', 'Password updated successfully.');
    }

    public function switchTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.account-settings');
    }
}
