<?php

namespace App\Livewire;

use App\Models\JobOrder;
use App\Models\Payroll;
use App\Services\LogService;
use Livewire\Component;

class AddPayroll extends Component
{
    public $pow_id;
    public $payroll_title;
    public $payroll_amount;
    public $payroll_date_start;
    public $payroll_date_end;
    public $job_order_id;
    public $job_orders;

    protected $rules = [
        'payroll_title' => 'required|string|max:255',
        'payroll_amount' => 'required|numeric',
        'payroll_date_start' => 'required|date',
        'payroll_date_end' => 'required|date',
    ];

    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
        $this->job_orders = JobOrder::where('pow_id', $pow_id)->get();
    }

    public function submit()
    {
        $this->validate();

        Payroll::create([
            'pow_id' => $this->pow_id,
            'job_order_id' => $this->job_order_id,
            'payroll_title' => $this->payroll_title,
            'payroll_amount' => $this->payroll_amount,
            'payroll_date_start' => $this->payroll_date_start,
            'payroll_date_end' => $this->payroll_date_end,
        ]);

        $job_order = JobOrder::where('pow_id', $this->pow_id)
            ->where('id', $this->job_order_id)
            ->first();

        if ($job_order) {
            $job_order->balance -= $this->payroll_amount;
            $job_order->save();
        } else {
            // Handle the case where no matching JobOrder is found
            throw new \Exception('Job Order not found.');
        }

        LogService::logAction(
            'create_payroll',
            "Payroll created with title: {$this->payroll_title} and amount: {$this->payroll_amount}",
            auth()->id()
        );

        // Dispatch browser event
        $this->dispatch('payroll-added');

        // Optionally clear fields or reset form
        $this->reset(['payroll_title', 'payroll_amount', 'payroll_date_start', 'payroll_date_end']);
    }

    public function render()
    {
        return view('livewire.add-payroll');
    }
}
