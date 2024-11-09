<?php

namespace App\Livewire;

use App\Models\DirectCost;
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

class OtherDirectCostTable extends PowerGridComponent
{
    use WithExport;
    use WithPagination;

    public $pow_id;


    public function setUp(): array
    {
        $this->showCheckBox();
        return [
            Exportable::make('export')
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
        return DirectCost::query()->where('pow_id', $this->pow_id);
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('item_no')
            ->add('description')
            ->add('%_of_total')
            ->add('quantity')
            ->add('unit')
            ->add('unit_cost')
            ->add('total_cost');


    }
    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->sortable(),
            Column::make('Description', 'description')->sortable()->searchable(),
            Column::make('%_of_total', '%_of_total')->sortable()->searchable(),
            Column::make('quantity', 'quantity')->sortable()->searchable(),
            Column::make('unit', 'unit')->sortable()->searchable(),
            Column::make('unit_cost', 'unit_cost')->sortable()->searchable(),
            Column::make('total_cost', 'total_cost')->sortable()->searchable(),
        ];
    }
}
