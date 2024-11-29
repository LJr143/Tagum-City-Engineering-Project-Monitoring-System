<?php

namespace App\Livewire;

use AllowDynamicProperties;
use App\Models\Log;
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

#[AllowDynamicProperties]
class PurchaseOrderTable extends PowerGridComponent
{
    use WithExport;
    use WithPagination;

    public $pow_id;
    public $startDate; // For storing the start date
    public $endDate;   // For storing the end date



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
        $query = PurchaseOrder::query()
            ->selectRaw('*, DATE_FORMAT(created_at, "%Y-%m-%d %H:%i:%s") as date_created_formatted')
            ->where('pow_id', $this->pow_id);

        // Apply date range filter if set
        if ($this->startDate && $this->endDate) {
            $query->whereBetween('created_at', [$this->startDate, $this->endDate]);
        }

        return $query;
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
            })
            ->add('created_at'); // Keep this for filtering
    }

    public function columns(): array
    {
        $columns = [
            Column::make('Id', 'id')->hidden(),
            Column::make('Purchase Order No.', 'purchase_order_number')->sortable()->searchable(),
            Column::make('Supplier', 'supplier')->sortable()->searchable(),
            Column::make('Total Items', 'total_items')->sortable()->searchable(),
            Column::make('Date Purchased', 'date_created_formatted') // Change to "Date Created"
            ->sortable()
                ->searchable(),
            Column::action('Action'),
        ];

        return $columns;
    }

    public function actionsFromView($row): View
    {
        return view('components.view-button', ['purchaseOrderNumber' => $row->purchase_order_number]);
    }



    public function filters(): array
    {
        return [
            // Custom filter fields for date range
            'startDate' => 'Start Date',
            'endDate' => 'End Date',
        ];
    }

    public function updating($propertyName)
    {
        // Trigger the table to refresh when the date fields are updated
        if ($propertyName === 'startDate' || $propertyName === 'endDate') {
            $this->resetPage();
        }
    }

    public function redirectToView($purchaseOrderNumber)
    {
        \Illuminate\Support\Facades\Log::info('View button clicked for PO number: ' . $purchaseOrderNumber);
        // Redirect to the view-po-materials route and pass the purchase order number
        return redirect()->route('view-po-materials', ['purchase_order_number' => $purchaseOrderNumber]);
    }
}
