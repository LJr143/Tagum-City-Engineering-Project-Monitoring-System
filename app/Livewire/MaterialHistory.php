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

class MaterialHistory extends PowerGridComponent
{
    use WithExport;
    use WithPagination;

    public $pow_id;
    public $startDate;
    public $endDate;
    public string $search = '';

    // Define the primary key and sort field explicitly
    public string $primaryKey = 'material_histories.id';
    public string $sortField = 'material_histories.id';

    public function setUp(): array
    {
//        $this->showCheckBox('material_histories.id');
        return [
            Exportable::make('export')
                ->striped()
                ->columnWidth([2 => 30])
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()
                ->showToggleColumns()
                ->withoutLoading()
                ->showSearchInput()
                ->includeViewOnTop('components.search-input-custom')
                ->includeViewOnTop('components.date-filter'),
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
        $query = \App\Models\MaterialHistory::query()
            ->select([
                'material_histories.id as material_history_id', // Alias to avoid ambiguity
                'material_histories.material_id',
                'material_histories.quantity_cost',
                'material_histories.pow_id',
                'material_histories.quantity',
                'material_histories.created_at',
                'materials.id as material_id', // Alias to avoid ambiguity
                'materials.item_no',
                'materials.item_description',
            ])
            ->join('materials', 'materials.id', '=', 'material_histories.material_id')
            ->where('material_histories.pow_id', $this->pow_id);

        // Filter by start and end dates
        if ($this->startDate) {
            $query->whereDate('material_histories.created_at', '>=', $this->startDate);
        }

        if ($this->endDate) {
            $query->whereDate('material_histories.created_at', '<=', $this->endDate);
        }

        // Add search filter based on the search term
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('materials.item_no', 'like', '%' . $this->search . '%')
                    ->orWhere('materials.item_description', 'like', '%' . $this->search . '%');
            });
        }

        // Explicitly specify which 'id' column to order by
        $query->orderBy('material_histories.id', 'asc') // Order by material_histories.id
        ->orderBy('materials.id', 'asc'); // Order by materials.id

        return $query;
    }

    public function uniqueKey(): string
    {
        return 'material_histories.id'; // Use the primary key explicitly
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('material_history_id') // Use the alias for material_histories.id
            ->add('item_no', function (\App\Models\MaterialHistory $materialHistory) {
                return $materialHistory->material->item_no;
            })
            ->add('description', function (\App\Models\MaterialHistory $materialHistory) {
                return $materialHistory->material->item_description;
            })
            ->add('quantity', function (\App\Models\MaterialHistory $materialHistory) {
                return $materialHistory->quantity;
            })
            ->add('total_cost', function (\App\Models\MaterialHistory $materialHistory) {
                return $materialHistory->total_cost;
            })
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'material_history_id') // Use the alias
            ->sortable()
                ->searchable(),

            Column::make('Item No', 'item_no')
                ->sortable()
                ->searchable(),

            Column::make('Description', 'description')
                ->sortable()
                ->searchable(),

            Column::make('Quantity', 'quantity')
                ->sortable()
                ->searchable(),

            Column::make('Total Cost', 'quantity_cost')
                ->sortable()
                ->searchable(),

            Column::make('Date', 'created_at')
                ->sortable()
                ->searchable(),
        ];
    }

    public function applyFilters(): void
    {
        $this->resetPage();
    }
}
