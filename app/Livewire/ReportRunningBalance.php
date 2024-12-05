<?php

namespace App\Livewire;


use App\Models\Material;
use App\Models\Payroll;
use App\Models\Project;
use Brick\Money\Money;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
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

class ReportRunningBalance extends PowerGridComponent
{
    use WithExport;
    use WithPagination;


    public bool $showFilters = true;

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

    public function boot(): void
    {
        config(['livewire-powergrid.filter' => 'outside']);
    }

    public function datasource(): ?Builder
    {
        return Project::query()->with('pows.indirectCosts', 'projectIncharge','pows');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('reference_number', function(Project $project) {
                $firstPow = $project->pows()->first();
                return $firstPow ? $firstPow->reference_number : 'N/A';
            })
            ->add('title')
            ->add('project_incharge', function (Project $project) {
                return $project->projectIncharge
                    ? $project->projectIncharge->first_name . ' ' . $project->projectIncharge->last_name
                    : 'N/A';
            })
            ->add('project_cost', function (Project $project) {
                $totalLabor = $project->pows->sum('total_labor_cost');
                $totalMaterials = $project->pows->sum('total_material_cost');
                $totalIndirects = $project->pows->flatMap(function ($pow) {
                    return $pow->indirectCosts->filter(function ($indirectCost) {
                        return preg_match('/^[0-9]+(\.?\s|$)/', $indirectCost->description);
                    });
                })->sum('amount');
                $totalDirectCosts = $project->pows->flatMap(fn($pow) => $pow->directCosts)->sum('amount');
                $totalCost = $totalLabor + $totalMaterials + $totalIndirects + $totalDirectCosts;
                return Money::of($totalCost, 'PHP')->formatTo('en_PH');
            })
           ->add('material_balance', function (Project $project) {
               $totalMaterials = $project->pows->sum('total_material_cost');
               $totalMaterialSpent = $project->pows->flatMap(fn($pow) => $pow->materials)->sum('spent_cost');
               $materialBalance = $totalMaterials - $totalMaterialSpent;
               return Money::of($materialBalance, 'PHP')->formatTo('en_PH');
           })
            ->add('labor_balance', function (Project $project) {
                $totalLabor = $project->pows->sum('total_labor_cost');
                $totalLaborSpent = $project->pows->flatMap(fn($pow) => $pow->payroll)->sum('payroll_amount');
                $laborBalance = $totalLabor - $totalLaborSpent;
                return Money::of($laborBalance, 'PHP')->formatTo('en_PH');
            })

            ->add('indirect_balance', function (Project $project){
                $totalIndirects = $project->pows->flatMap(function ($pow) {
                    return $pow->indirectCosts->filter(function ($indirectCost) {
                        return preg_match('/^[0-9]+(\.?\s|$)/', $indirectCost->description);
                    });
                })->sum('amount');
                $totalIndirectSpent = $project->pows->flatMap(fn($pow) => $pow->indirectCosts)->sum('spent_cost');
                $indirectBalance = $totalIndirects - $totalIndirectSpent;

                return Money::of($indirectBalance, 'PHP')->formatTo('en_PH');
            })

            ->add('direct_balance', function (Project $project){
                $totalDirectCosts = $project->pows->flatMap(fn($pow) => $pow->directCosts)->sum('amount');
                $totalDirectSpent = $project->pows->flatMap(fn($pow) => $pow->directCosts)->sum('spent_cost');
                $directBalance = $totalDirectCosts - $totalDirectSpent;

                return Money::of($directBalance, 'PHP')->formatTo('en_PH');
            })


            ->add('status');
    }

    public function columns(): array
    {
        return [
            Column::make('PRN', 'reference_number'),
            Column::make('Project Name', 'title')
                ->sortable()
                ->searchable(),
            Column::make('Project Incharge', 'project_incharge'),
            Column::make('Project Cost', 'project_cost')
                ->sortable()
                ->searchable(),
            Column::make('Material Bal.', 'material_balance'),
            Column::make('Labor Bal.', 'labor_balance'),
            Column::make('Indirect Bal.', 'indirect_balance'),
            Column::make('Other Direct Bal.', 'direct_balance'),

            Column::make('Remarks', 'status')
                ->searchable(),
        ];
    }


    public function filters(): array
    {
        return [
            Filter::select('baranggay', 'Baranggay')
                ->dataSource(Project::select('baranggay')->distinct()->get())
                ->optionValue('baranggay')
                ->optionLabel('baranggay'),


            Filter::select('status', 'Status')
                ->dataSource(Project::select('status')->distinct()->get())
                ->optionValue('status')
                ->optionLabel('status'),
        ];
    }

}
