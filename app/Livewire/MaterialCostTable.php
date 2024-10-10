<?php
namespace App\Livewire;

use App\Models\Material;
use App\Models\Pow;
use Livewire\Component;
use Carbon\Carbon;

class MaterialCostTable extends Component
{
    public $pow_id;
    public $totalMaterialCost = 0;
    public $spentCost = 0;
    public $progressPercentage = 0;
    public $targetProgressPercentage = 0;
    public $isOutOfBudget = false;

    // Mount method to initialize component with the pow_id
    public function mount($pow_id): void
    {
        $this->pow_id = $pow_id;
        $this->calculateCosts();
    }

    public function calculateCosts()
    {
        $materials = Material::where('pow_id', $this->pow_id)->get();

        $this->totalMaterialCost = $materials->sum('estimated_cost');
        $this->spentCost = $materials->sum('spent_cost');

        $programOfWork = Pow::find($this->pow_id);

        if ($programOfWork && $programOfWork->start_date && $programOfWork->end_date) {
            $startDate = Carbon::parse($programOfWork->start_date);
            $endDate = Carbon::parse($programOfWork->end_date);

            $projectDurationMonths = $startDate->diffInMonths($endDate);

            $elapsedMonths = $startDate->diffInMonths(Carbon::now());
        } else {

            $projectDurationMonths = 6;
            $elapsedMonths = 2;
        }


        if ($projectDurationMonths > 0) {
            $this->targetProgressPercentage = ($elapsedMonths / $projectDurationMonths) * 100;
        } else {
            $this->targetProgressPercentage = 0;
        }

        if ($this->totalMaterialCost > 0) {
            $this->progressPercentage = ($this->spentCost / $this->totalMaterialCost) * 100;
        } else {
            $this->progressPercentage = 0;
        }

        $this->isOutOfBudget = $this->spentCost > $this->totalMaterialCost;
    }

    public function render()
    {
        return view('livewire.material-cost-table');
    }
}

