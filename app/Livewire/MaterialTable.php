<?php

namespace App\Livewire;

use AllowDynamicProperties;
use App\Models\Material;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Livewire\WithPagination;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

#[AllowDynamicProperties] class MaterialTable extends PowerGridComponent
{
    use WithExport;
    use WithPagination;

    public $selectedUserId;
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
                ->showPerPage(10) // Set default items per page
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
        return Material::query()->where('pow_id', $this->pow_id);
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('pow')
            ->add('item_no')
            ->add('quantity')
            ->add('unit_of_issue')
            ->add('item_description')
            ->add('estimated_unit_cost')
            ->add('estimated_cost');
    }

    public function columns(): array
    {
        $columns = [
            Column::make('Id', 'id')->hidden(),
            Column::make('Item No', 'item_no')->sortable()->searchable(),
            Column::make('Quantity', 'quantity')->sortable()->searchable(),
            Column::make('Unit of Issue', 'unit_of_issue')->sortable()->searchable(),
            Column::make('Item Description', 'item_description')->sortable()->searchable(),
            Column::make('Unit Cost', 'estimated_unit_cost')->searchable(),
            Column::make('Total Cost', 'estimated_cost'),
        ];

        if (auth()->user()->isEngineer()) {
            $columns[] = Column::action('Action')->bodyAttribute('text-center');
        }

        return $columns;
    }

    public function actionsFromView($row): View
    {
        return view('actions-view-material', ['row' => $row]);
    }
    public function edit($rowId)
    {
        $this->selectedUserId = $rowId;
        $this->dispatch('open-edit-modal');
    }





}
