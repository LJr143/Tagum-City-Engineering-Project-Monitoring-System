<?php

namespace App\Livewire;

use Livewire\Component;

class PowInfoDetails extends Component
{
    public $pow;
    public $index;
    protected $listeners = ['suspend-success'=>'render', 'resumed-success'=>'render'];

    public function mount($pow, $index): void
    {
        $this->pow = $pow;   // Assign to the class property
        $this->index = $index; // Assign to the class property
    }

    public function render()
    {
        return view('livewire.pow-info-details', [
            'pow' => $this->pow,
            'index' => $this->index,
        ]);
    }
}
