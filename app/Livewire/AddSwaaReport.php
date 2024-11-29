<?php

namespace App\Livewire;

use App\Models\Pow;
use Livewire\Component;

class AddSwaaReport extends Component
{
    public $pow_id;
    public $pow; // Declare as public property

    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
        $this->pow = Pow::findOrFail($pow_id); // Set $pow
    }

    public function render()
    {
        return view('livewire.add-swaa-report');
    }
}
