<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class AccountSettings extends Component
{
    use WithFileUploads;

    public $profileImage;
    public $defaultProfileImage = 'storage/app/public/pmsAssets/default.png';
    public $name = "Fname MI. Lname";
    public $birthdate = "2000-01-01";
    public $age = 24;
    public $phoneNumber = "+639123456789";
    public $email = "fnamemilname@gmail.com";
    public $userID;
    public $currentPassword = "••••••••";
    public $newPassword;
    public $confirmNewPassword;

    public function updatedProfileImage()
    {
        // Automatically handle profile image preview
        $this->validate([
            'profileImage' => 'image|max:1024', // 1MB Max
        ]);
    }

    public function saveChanges()
    {
        // Save logic for personal and contact information
    }

    public function updateAccount()
    {
        // Save logic for account information (password)
    }

    public function render()
    {
        return view('livewire.account-settings', [
            'profileImageUrl' => $this->profileImage ? $this->profileImage->temporaryUrl() : $this->defaultProfileImage,
        ]);
    }
}
