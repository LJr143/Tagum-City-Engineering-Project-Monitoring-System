<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

class UserTable extends PowerGridComponent
{
    use WithExport;
    public $selectedUserId;
    protected $listeners = ['user-deleted' => '$refresh', 'user-edited' => '$refresh', 'user-added'=>'$refresh'];


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
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function boot(): void
    {
        config(['livewire-powergrid.filter' => 'outside']);
    }

    public function datasource(): Builder
    {
        return User::query();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('first_name')
            ->add('last_name')
            ->add('middle_initial')
            ->add('gender')
            ->add('birth_date')
            ->add('email')
            ->add('contact_number')
            ->add('position')
            ->add('role');
    }

    public function columns(): array
    {
        return [
            Column::make('User ID', 'id')->searchable()->bodyAttribute('w-[10px]'),
            Column::make('First Name', 'first_name')
                ->searchable(),
            Column::make('M.I', 'middle_initial')->searchable(),
            Column::make('Last Name', 'last_name')->searchable(),
            Column::make('Gender', 'gender')->searchable(),
            Column::make('Birthdate', 'birth_date')->searchable(),
            Column::make('Email', 'email')->searchable(),
            Column::make('Contact Number', 'contact_number')->searchable(),
            Column::make('Position', 'position')->searchable(),
            Column::make('Role', 'role')->searchable(),

            // Action column
            Column::action('Action')->bodyAttribute('text-center'),
        ];
    }

    public function actionsFromView($row): View
    {
        return view('actions-view', ['row' => $row]);
    }

    public function edit($rowId)
    {
        $this->selectedUserId = $rowId;
        $this->dispatch('open-edit-modal');
    }


    public function delete($rowId)
    {
        // Find the user by ID
        $user = User::find($rowId);

        if ($user) {
            $user->delete();
            session()->flash('success', 'User deleted successfully.');
        } else {
            session()->flash('error', 'User not found.');
        }

        // Redirect back to the manage-user route with the current pagination page
        return redirect()->route('manage-user', ['page' => request()->query('page', 1)]);
    }

}
