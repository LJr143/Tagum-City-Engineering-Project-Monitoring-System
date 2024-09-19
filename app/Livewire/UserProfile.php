<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfile extends Component
{
    use WithFileUploads;

    public $profileImage;
    public $defaultProfileImage = 'https://oaidalleapiprodscus.blob.core.windows.net/private/org-LmQ09WWGIGwOeeA4ArnRw0x5/user-uJPET5fjNenSso8wCETWVNOp/img-LAE4As8cAsJhr9Ub7PTU97C7.png';
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
        return view('livewire.user-profile', [
            'profileImageUrl' => $this->profileImage ? $this->profileImage->temporaryUrl() : $this->defaultProfileImage,
        ]);
    }
}
