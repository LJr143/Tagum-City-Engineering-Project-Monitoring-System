<?php

namespace App\Livewire;

use App\Models\DirectCost;
use App\Models\IndirectCost;
use App\Models\PurchaseOrder;
use App\Models\User;
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

class RealignmentHistory extends PowerGridComponent
{
    use WithExport;
    use WithPagination;

    public $pow_id;

    protected $listeners = ['realignment-success'=>'$refresh'];

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
        return \App\Models\RealignmentHistory::query()->where('pow_id', $this->pow_id);
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('source_item_id', function (\App\Models\RealignmentHistory $realignmentHistory) {
                if ($realignmentHistory->source_type == 'direct_cost') {
                    $destinationItem = DirectCost::find($realignmentHistory->destination_item_id);
                    return $destinationItem ? $destinationItem->description : 'No description available';
                }

                // Check if the source type is 'Indirect Cost'
                elseif ($realignmentHistory->source_type == 'indirect_cost') {
                    $destinationItem = IndirectCost::find($realignmentHistory->destination_item_id);
                    return $destinationItem ? $destinationItem->description : 'No description available';
                }

                // Return a fallback message if source_type is neither
                return 'Invalid source type';
            })
            ->add('source_type')
            ->add('destination_item_id', function (\App\Models\RealignmentHistory $realignmentHistory) {
                // Check if the source type is 'Direct Cost'
                if ($realignmentHistory->destination_type == 'direct_cost') {
                    $destinationItem = DirectCost::find($realignmentHistory->destination_item_id);
                    return $destinationItem ? $destinationItem->description : 'No description available';
                }

                // Check if the source type is 'Indirect Cost'
                elseif ($realignmentHistory->destination_type == 'indirect_cost') {
                    $destinationItem = IndirectCost::find($realignmentHistory->destination_item_id);
                    return $destinationItem ? $destinationItem->description : 'No description available';
                }

                // Return a fallback message if source_type is neither
                return 'Invalid source type';
            })

        ->add('destination_type')
            ->add('amount')
            ->add('realigned_by', function (\App\Models\RealignmentHistory $realignmentHistory) {
                // Get the name of the user who realigned
                $user = User::find($realignmentHistory->realigned_by);
                return $user ? $user->first_name . $user->initial . ' ' . $user->last_name : 'Unknown User';
            });




    }

    public function columns(): array
    {
        $columns = [
            Column::make('Id', 'id')->hidden(),
            Column::make('Source Item', 'source_item_id')->sortable()->searchable(),
            Column::make('Source Type', 'source_type')->sortable()->searchable(),
            Column::make('Destination Item', 'destination_item_id')->sortable()->searchable(),
            Column::make('Destination Type', 'destination_type')->sortable()->searchable(),
            Column::make('Amount', 'amount')->sortable()->searchable(),
            Column::make('By', 'realigned_by')->sortable()->searchable(),
        ];


        return $columns;
    }



}
