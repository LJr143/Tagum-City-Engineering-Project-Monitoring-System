<?php

namespace App\Livewire;

use App\Models\SwaReport;
use App\Models\User;
use App\Services\LogService;
use Livewire\Component;

class EditSwaa extends Component
{
    public $id;
    public $item_no, $to_date_qty, $to_date_unit, $percent_accomplishment;

    protected $rules = [
        'item_no' => 'required|numeric',
        'to_date_qty' => 'required|numeric',
        'to_date_unit' => 'required|string|max:2',
        'percent_accomplishment' => 'required|string|max:25',
    ];

    public function mount($id)
    {
        $this->id = $id; // Store user ID for later use
        $swa = SwaReport::find($id);

        if ($swa) {
            $this->item_no = $swa->item_no;
            $this->to_date_qty = $swa->to_date_qty;
            $this->to_date_unit = $swa->to_date_unit;
            $this->percent_accomplishment = $swa->percent_accomplishment;
        }
    }


    public function submit()
    {
        $this->validate();

        try {
            $swa = SwaReport::find($this->id);

            if ($swa) {
                $swa->update([
                    'item_no' => $this->item_no,
                    'to_date_qty' => $this->to_date_qty,
                    'to_date_unit' => $this->to_date_unit,
                    'percent_accomplishment' => $this->percent_accomplishment,
                ]);

                $this->reset();

                session()->flash('message', 'User updated successfully.');
                LogService::logAction(
                    'edited user',
                    "Edited User with user id: {$this->user_id}",
                    auth()->id()
                );
//                $this->dispatch('user-edited');
                return redirect()->route('material-table-cost');

            }
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while updating the user: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.edit-swaa');
    }
}
