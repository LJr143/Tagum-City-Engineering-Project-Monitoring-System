<?php

namespace App\Livewire;

use App\Models\JobOrder;
use App\Models\Payroll;
use Brick\Money\Money;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

class JobOrderTable extends PowerGridComponent
{
    use WithExport;
    public $pow_id;
    public string $tableName = 'JobOrderTable';
    public $listeners = ['job-order-added'=>'$refresh', 'payroll-added'=>'$refresh'];
    public function setUp(): array
    {
        $this->showCheckBox();
        return [
            Exportable::make('job_order_report_' . now()->format('Y-m-d_H-i-s'))
                ->striped()
                ->columnWidth([2 => 30])
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()
                ->showToggleColumns()
                ->withoutLoading(),
            Footer::make()
                ->showPerPage()
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
        return JobOrder::query()->where('pow_id', $this->pow_id);
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('designation')
            ->add('rate_per_date')
            ->add('job_order_period', function (JobOrder $jobOrder) {
                return $jobOrder->job_order_from . ' - ' . $jobOrder->job_order_to;
            })
            ->add('amount')
            ->add('balance');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->sortable()->searchable(),
            Column::make('Name', 'name')->sortable()->searchable(),
            Column::make('Designation', 'designation')->sortable()->searchable(),
            Column::make('Rate Per Period', 'rate_per_date')->sortable()->searchable(),
            Column::make('Job Order Period', 'job_order_period')->sortable()->searchable(),
            Column::make('Amount', 'amount')->sortable()->searchable(),
            Column::make('Balance', 'balance')->sortable()->searchable(),
        ];
    }
}
