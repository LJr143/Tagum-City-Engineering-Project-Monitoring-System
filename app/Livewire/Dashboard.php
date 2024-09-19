<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $projects = [];
    public $users = [];

    public function mount()
    {
        // Fetch data from DB and set properties
        $this->projects = [
            'total' => 123,
            'onProgress' => 31,
            'pending' => 65,
            'completed' => 27,
        ];

        $this->users = [
            'civil' => 79,
            'electrical' => 65,
            'architect' => 27,
        ];
    }

    public function render()
    {
        return view('livewire.dashboard');
    }




}
