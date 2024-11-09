<?php

namespace App\Livewire;

use App\Models\Pow;
use App\Models\PowSuspendResume;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SuspendProject extends Component
{
    public $powId;
    public $index;

    public function suspend()
    {
        $pow = Pow::find($this->powId);
        $project = Project::with('pows')->find($pow->project_id);

        if ($pow && $project) {

            $project->status = 'suspended';
            $project->save();

            PowSuspendResume::create([
                'pow_id' => $this->powId,
                'transaction' => 'suspended',
                'user_id' => Auth::id(),
                'created_at' => now(),
            ]);

            $this->dispatch('suspend-success');

            return redirect()->route('material-table-cost', ['pow_id' => $this->powId, 'index' => $this->index]);

        }

    }
    public function render()
    {
        return view('livewire.suspend-project');
    }
}
