<?php

namespace App\Livewire;

use App\Models\JobOrder;
use App\Models\Payroll;
use App\Models\Pow;
use App\Services\LogService;
use Livewire\Component;

class AddJobOrder extends Component
{
    public $pow_id;
    public $jo_name;
    public $jo_designation;
    public $jo_rate_per_day;
    public $jo_date_start;
    public $jo_date_end;
    public $jo_total_amount;
    public $laborCostBalance;
    public $totalLaborCost;
    public $totalJobOrder;

    protected $rules = [
        'jo_name' => 'required|string|max:255',
        'jo_designation' => 'nullable|string|max:255',
        'jo_rate_per_day' => 'nullable|numeric',
        'jo_date_start' => 'required|date',
        'jo_date_end' => 'required|date',
        'jo_total_amount' => 'required|numeric',

    ];

    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
    }

    public function submit()
    {
        $this->validate();

        $pow = Pow::where('id', $this->pow_id)->first();
        $labor = Payroll::where('pow_id', $this->pow_id)->get();
        $jobOrder = JobOrder::where('pow_id', $this->pow_id)->get();

        $this->totalJobOrder = $jobOrder->sum('amount');
        $this->totalLaborCost = $pow->total_labor_cost;
        $this->laborCostBalance = $this->totalLaborCost - $this->totalJobOrder;

        if( $this->jo_total_amount <= $this->laborCostBalance){
            JobOrder::create([
                'pow_id' => $this->pow_id,
                'name' => $this->jo_name,
                'designation' => $this->jo_designation,
                'rate_per_date' => $this->jo_rate_per_day,
                'job_order_from' => $this->jo_date_start,
                'job_order_to' => $this->jo_date_end,
                'amount' => $this->jo_total_amount,
                'balance'=>$this->jo_total_amount,

            ]);

            LogService::logAction(
                'create_job_order',
                "Job Order created with title: {$this->jo_name} and amount: {$this->jo_total_amount}",
                auth()->id()
            );

            // Dispatch browser event
            $this->dispatch('job-order-added');
        }else{
                $this->dispatch('job-order-failed');
        }



        // Optionally clear fields or reset form
        $this->reset(['jo_name', 'jo_designation', 'jo_rate_per_day', 'jo_date_start', 'jo_date_end', 'jo_total_amount']);
    }

    public function render()
    {
        return view('livewire.add-job-order');
    }
}
