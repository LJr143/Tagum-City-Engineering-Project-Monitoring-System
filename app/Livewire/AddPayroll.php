<?php

namespace App\Livewire;

use App\Models\Payroll;
use App\Services\LogService;
use Livewire\Component;

class AddPayroll extends Component
{
    public $pow_id;
    public $payroll_title;
    public $payroll_amount;
    public $payroll_date;

    protected $rules = [
        'payroll_title' => 'required|string|max:255',
        'payroll_amount' => 'required|numeric',
        'payroll_date' => 'required|date',
    ];

    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
    }

    public function submit()
    {
        $this->validate();

        Payroll::create([
            'pow_id' => $this->pow_id,
            'payroll_title' => $this->payroll_title,
            'payroll_amount' => $this->payroll_amount,
            'payroll_date' => $this->payroll_date,
        ]);

        LogService::logAction(
            'create_payroll',
            "Payroll created with title: {$this->payroll_title} and amount: {$this->payroll_amount}",
            auth()->id()
        );

        // Dispatch browser event
        $this->dispatch('payroll-added');

        // Optionally clear fields or reset form
        $this->reset(['payroll_title', 'payroll_amount', 'payroll_date']);
    }

    public function render()
    {
        return view('livewire.add-payroll');
    }
}
