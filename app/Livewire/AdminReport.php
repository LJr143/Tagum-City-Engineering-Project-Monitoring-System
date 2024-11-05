<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Material;
use App\Models\Payroll;
use Brick\Money\Money;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\Facades\Filter;

class AdminReport extends PowerGridComponent
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
        return Project::query()->with('pows.indirectCosts', 'projectIncharge'); // Ensure relationships are loaded
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('title')
            ->add('baranggay')
            ->add('project_cost', function (Project $project) {
                $totalLabor = $project->pows->sum('total_labor_cost');
                $totalMaterials = $project->pows->sum('total_material_cost');
                $totalIndirects = $project->pows->flatMap(fn($pow) => $pow->indirectCosts)->sum('amount');
                $totalCost = $totalLabor + $totalMaterials + $totalIndirects;
                return Money::of($totalCost, 'PHP')->formatTo('en_PH');
            })
            ->add('description', fn(Project $project) => Str::limit($project->description, 30, '...'))
            ->add('start_date')
            ->add('end_date')
            ->add('accomplishment_percentage', function (Project $project) {
                return $this->calculateAccomplishmentPercentage($project);
            })
            ->add('project_incharge', function (Project $project) {
                return $project->projectIncharge
                    ? $project->projectIncharge->first_name . ' ' . $project->projectIncharge->last_name
                    : 'N/A';
            })
            ->add('status');
    }

    public function columns(): array
    {
        return [
            Column::make('PRN', 'id'),
            Column::make('Project Name', 'title')
                ->sortable()
                ->searchable(),
            Column::make('Location', 'baranggay')
                ->sortable()
                ->searchable(),
            Column::make('Project Cost', 'project_cost')
                ->sortable()
                ->searchable(),
            Column::make('Project Description', 'description'),
            Column::make('Date Started', 'start_date'),
            Column::make('Target Date', 'end_date'),
//            Column::make('Date of Completion', ''),
            Column::make('Accomplishment (%)', 'accomplishment_percentage')
                ->sortable()
                ->bodyAttribute('style', 'text-align: center;'),
            Column::make('Project Incharge', 'project_incharge'),
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

    private function calculateAccomplishmentPercentage(Project $project): string
    {
        // Fetch related materials and labor records
        $materials = Material::whereIn('pow_id', $project->pows->pluck('id'))->get();
        $labor = Payroll::whereIn('pow_id', $project->pows->pluck('id'))->get();

        // Calculate total spent costs
        $spentMaterialCost = $materials->sum('spent_cost');
        $spentLaborCost = $labor->sum('payroll_amount');
        $spentIndirectCost = $project->pows->flatMap(fn($pow) => $pow->indirectCosts)->sum('spent_cost');

        $totalSpentCost = $spentMaterialCost + $spentLaborCost + $spentIndirectCost;

        // Calculate total project costs
        $totalMaterialCost = $project->pows->sum('total_material_cost');
        $totalLaborCost = $project->pows->sum('total_labor_cost');
        $totalIndirectCost = $project->pows->flatMap(fn($pow) => $pow->indirectCosts)->sum('amount');

        $totalProjectCost = $totalMaterialCost + $totalLaborCost + $totalIndirectCost;

        $percentage = $totalProjectCost > 0
            ? ($totalSpentCost / $totalProjectCost) * 100
            : 0;

        return number_format($percentage, 1) . '%';
    }


}
