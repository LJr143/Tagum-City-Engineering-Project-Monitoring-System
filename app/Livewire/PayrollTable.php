<?php

    namespace App\Livewire;
    use App\Models\Payroll;
    use Illuminate\Database\Eloquent\Builder;
    use PowerComponents\LivewirePowerGrid\Column;
    use PowerComponents\LivewirePowerGrid\Exportable;
    use PowerComponents\LivewirePowerGrid\Footer;
    use PowerComponents\LivewirePowerGrid\Header;
    use PowerComponents\LivewirePowerGrid\PowerGrid;
    use PowerComponents\LivewirePowerGrid\PowerGridComponent;
    use PowerComponents\LivewirePowerGrid\PowerGridFields;
    use PowerComponents\LivewirePowerGrid\Traits\WithExport;

    class PayrollTable extends PowerGridComponent
    {
        use WithExport;
        public $pow_id;
        public string $tableName = 'PayrollTable';

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

        public function hydrate(): void
        {

            if (!isset($this->pow_id)) {
                $this->pow_id = request()->route('pow')->pow_id;
            }
        }

        public function datasource(): Builder
        {
            return Payroll::query()->where('pow_id', $this->pow_id);
        }

        public function fields(): PowerGridFields
        {
            return PowerGrid::fields()
                ->add('id')
                ->add('payroll_title')
                ->add('payroll_amount')
                ->add('payroll_date');
        }

        public function columns(): array
        {
            return [
                Column::make('Payroll ID', 'id')->sortable()->searchable(),
                Column::make('Payroll Title', 'payroll_title')->sortable()->searchable(),
                Column::make('Payroll Amount', 'payroll_amount')->sortable()->searchable(),
                Column::make('Payroll Date', 'payroll_date')->sortable()->searchable(),
            ];
        }

    }
