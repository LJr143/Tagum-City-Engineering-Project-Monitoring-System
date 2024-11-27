<?php

namespace App\Livewire;

use Livewire\Component;

class AddSwaaReport extends Component
{

    public $pow_id;

    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
    }

    public function render()
    {
        return view('livewire.add-swaa-report');
    }
}
