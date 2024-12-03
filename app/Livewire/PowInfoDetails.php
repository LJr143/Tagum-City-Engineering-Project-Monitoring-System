<?php

namespace App\Livewire;

use Livewire\Component;

class PowInfoDetails extends Component
{
    public $pow;
    public $index;
    protected $listeners = ['suspend-success'=>'render', 'resumed-success'=>'render', 'mark-complete'=>'render'];

    public function mount($pow, $index): void
    {
        $this->pow = $pow;
        $this->index = $index;
    }

    public function render()
    {
        return view('livewire.pow-info-details', [
            'pow' => $this->pow,
            'index' => $this->index,
        ]);
    }
}
