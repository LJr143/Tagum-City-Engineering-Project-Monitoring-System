<?php

namespace App\Livewire;

use App\Models\DirectCost;
use App\Models\Project;
use App\Models\PurchaseOrder;
use App\Models\SwaReport;
use Brick\Money\Money;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

class SwaReportTbale extends PowerGridComponent
{
    use WithExport;
    use WithPagination;

    public bool $showFilters = true;
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
                ->withoutLoading()
                ->includeViewOnTop('components.search-input-custom'),
            Footer::make()
                ->showPerPage(10)
                ->showRecordCount(),
        ];
    }

    public function hydrate(): void
    {
        if (!isset($this->pow_id)) {
            $this->pow_id = request()->route('pow')->pow_id;
        }
    }


    public function boot(): void
    {
        config(['livewire-powergrid.filter' => 'outside']);
    }

    public function datasource(): ?Builder
    {
        return SwaReport::query()->where('pow_id', $this->pow_id);
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('item_no')
            ->add('description')
            ->add('%_of_total', function (SwaReport $swaReport) {
                $property = '%_of_total';
                $value = $swaReport->{$property}; // Dynamically access the property
                $percentage = $value * 100; // Convert to percentage
                return round($percentage, 2); // Round to 2 decimal places

            })
            ->add('quantity')
            ->add('unit')
            ->add('unit_cost', function (SwaReport $swaReport) {
                $unit = round($swaReport->unit_cost, 2);
                return Money::of($unit, 'PHP')->formatTo('en_PH');

            })
            ->add('total_cost', function (SwaReport $swaReport) {
                $total_cost = round($swaReport->total_cost, 2);
                return Money::of($total_cost, 'PHP')->formatTo('en_PH');
            })
            ->add('prev_qty')
            ->add('prev_unit')
            ->add('this_month_qty')
            ->add('this_month_unit')
            ->add('to_date_qty')
            ->add('to_date_unit')
            ->add('percent_accomplishment');
    }

    public function columns(): array
    {
        return [
            Column::make('Item No.', 'item_no'),
            Column::make('Description', 'description')
                ->sortable()
                ->searchable(),
            Column::make('Project Weight %', '%_of_total')
                ->sortable()
                ->searchable(),
            Column::make('Total Quantity', 'quantity')
                ->sortable()
                ->searchable(),
            Column::make('Unit', 'unit')
                ->sortable()
                ->searchable(),
            Column::make('Unit Cost', 'unit_cost'),
            Column::make('Total Cost', 'total_cost'),
            Column::make('Prev. Quantity', 'prev_qty'),
            Column::make('This Month', 'this_month_qty'),
            Column::make('To Date Quantity', 'to_date_qty'),
            Column::make('% Accomplishment', 'percent_accomplishment'),
        ];
    }

    public function actionsFromView($row): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\View\View
    {
        return view('actions-view-swa', ['row' => $row]);
    }

}
