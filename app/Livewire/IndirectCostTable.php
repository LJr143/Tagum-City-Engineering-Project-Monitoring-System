<?php

namespace App\Livewire;

use App\Models\IndirectCost;
use Brick\Money\Money;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

class IndirectCostTable extends PowerGridComponent
{

    use WithExport;
    use WithPagination;

    public $pow_id;


    public function setUp(): array
    {
        $this->showCheckBox();
        return [
            Exportable::make('indirect_cost_report_' . now()->format('Y-m-d'))
                ->striped()
                ->columnWidth([2 => 30])
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()
                ->showToggleColumns()
                ->withoutLoading(),
            Footer::make()
                ->showPerPage(10)
                ->showRecordCount(),
        ];
    }

    public function boot(): void
    {
        config(['livewire-powergrid.filter' => 'outside']);
    }


    public function hydrate(): void
    {
        if (!isset($this->pow_id)) {
            $this->pow_id = request()->route('pow')->pow_id;
        }
    }

    public function datasource(): Builder
    {
        return IndirectCost::query()->where('pow_id', $this->pow_id);
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('description')
            ->add('amount', function (IndirectCost $indirectCost){
                $indirectCostAmount = $indirectCost->amount;

                return Money::of($indirectCostAmount, 'PHP')->formatTo('en_PH');
            });
    }
    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->sortable(),
            Column::make('Description', 'description')->sortable()->searchable(),
            Column::make('Amount', 'amount')->sortable()->searchable(),
        ];
    }




}
