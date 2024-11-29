<?php

namespace App\Livewire;

use App\Models\Pow;
use App\Models\SwaReport;
use Carbon\Carbon;
use Livewire\Component;

class AddSwaReport extends Component
{
    public $pow;
    public $swa_report = [['item_no' => '', 'to_date_qty' => '', 'percent_accomplishment' => '']];
    public $pow_id;

    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
        $pow = Pow::findOrFail($pow_id);
    }

    public function addSwa()
    {
        $this->swa_report[] = ['item_no' => '', 'to_date_qty' => '', 'percent_accomplishment' => ''];
    }

    public function removeSwa($index)
    {
        unset($this->swa_report[$index]);
        $this->swa_report = array_values($this->swa_report);
    }

    public function saveSwaReport()
    {
        // Validation rules
        $this->validate([
            'swa_report.*.item_no' => 'required|string',
            'swa_report.*.to_date_qty' => 'required|numeric', // This month's quantity
            'swa_report.*.percent_accomplishment' => 'required|numeric', // Accomplishment for this month
        ]);

        foreach ($this->swa_report as $swa) {
            // Identify the current month
            $currentMonth = Carbon::now()->format('Y-m');

            // Check for existing records
            $existingSwa = SwaReport::where('item_no', $swa['item_no'])
                ->where('pow_id', $this->pow_id)
                ->first();

            $thisMonthQty = $swa['to_date_qty']; // Quantity for this month
            $prevQty = $existingSwa ? $existingSwa->to_date_qty : 0; // Previous total quantity
            $toDateQty = $prevQty + $thisMonthQty; // Total quantity up to date

            $thisMonthAccomplishment = $swa['percent_accomplishment']; // This month's accomplishment
            $cumulativeAccomplishment = $existingSwa
                ? $existingSwa->percent_accomplishment + $thisMonthAccomplishment // Add to existing value
                : $thisMonthAccomplishment; // Start with current value if no record exists

            if ($existingSwa) {
                // Check if there's a record updated this month
                $isCurrentMonth = Carbon::parse($existingSwa->updated_at)->format('Y-m') === $currentMonth;

                if ($isCurrentMonth) {
                    // Update the current month's quantity and cumulative accomplishment
                    $existingSwa->update([
                        'this_month_qty' => $thisMonthQty + $existingSwa->to_date_qty,
                        'to_date_qty' => $toDateQty, // Update total quantity
                        'percent_accomplishment' => $cumulativeAccomplishment, // Add to accomplishment
                    ]);
                } else {
                    // Update previous quantity and add new this month's data
                    $existingSwa->update([
                        'prev_qty' => $prevQty, // Update with total to date before this month's addition
                        'this_month_qty' => $thisMonthQty,
                        'to_date_qty' => $toDateQty, // Total including current month's addition
                        'percent_accomplishment' => $cumulativeAccomplishment, // Add to accomplishment
                    ]);
                }
            } else {
                // Create a new record for this month's data
                SwaReport::create([
                    'pow_id' => $this->pow_id,
                    'item_no' => $swa['item_no'],
                    'description' => $swa['description'],
                    'quantity' => $thisMonthQty, // This month's quantity
                    'prev_qty' => $prevQty, // Previous total quantity (0 for new records)
                    'this_month_qty' => $thisMonthQty, // Only current month's quantity
                    'to_date_qty' => $toDateQty, // Total up to date
                    'percent_accomplishment' => $cumulativeAccomplishment, // Add to accomplishment
                    'unit' => 'unit', // Default or dynamic unit
                    'unit_cost' => 0, // Default or dynamic unit cost
                    'total_cost' => 0, // Default or dynamic total cost
                ]);
            }
        }

        // Reset the form fields
        $this->reset(['swa_report']);

        // Dispatch an event to indicate successful save
        $this->dispatch('MaterialUpdateSaved');
    }

    public function render()
    {
        return view('livewire.add-swa-report');
    }
}
