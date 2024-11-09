<?php

namespace App\Livewire;

use AllowDynamicProperties;
use App\Models\Material;
use App\Models\PurchaseOrder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

#[AllowDynamicProperties] class PurchaseOrderTable extends PowerGridComponent
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
        return PurchaseOrder::query()->where('pow_id', $this->pow_id);
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('purchase_order_number')
            ->add('supplier')
            ->add('quantity')
            ->add('total_items', function () {
                return PurchaseOrder::where('pow_id', $this->pow_id)
                ->distinct('purchase_order_number')
                ->count('purchase_order_number');
            });



    }

    public function columns(): array
    {
        $columns = [
            Column::make('Id', 'id')->hidden(),
            Column::make('Purchase Order No.', 'purchase_order_number')->sortable()->searchable(),
            Column::make('Supplier', 'supplier')->sortable()->searchable(),
            Column::make('Total Items', 'total_items')->sortable()->searchable(),
        ];


        return $columns;
    }


}
