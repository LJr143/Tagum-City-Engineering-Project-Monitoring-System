<?php

namespace App\Livewire;

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

class PowSuspendResume extends PowerGridComponent
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
        return \App\Models\PowSuspendResume::query()
            ->where('pow_id', $this->pow_id)
            ->leftJoin('users', 'pow_suspend_resumes.user_id', '=', 'users.id')
            ->select('pow_suspend_resumes.*', 'users.first_name as by');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('transaction')
            ->add('by')
            ->add('created_at');
    }
    public function columns(): array
    {
        return [
            Column::make('Transaction', 'transaction')->sortable()->searchable(),
            Column::make('Made By', 'by')->sortable()->searchable(),
            Column::make('Transaction Date', 'created_at')->sortable()->searchable(),
        ];
    }
}
