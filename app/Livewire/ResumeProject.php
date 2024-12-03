<?php

namespace App\Livewire;

use App\Models\Pow;
use App\Models\PowSuspendResume;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ResumeProject extends Component
{
    public $powId;
    public $index;

    public function resume()
    {
        $pow = Pow::find($this->powId);
        $project = Project::with('pows')->find($pow->project_id);

        if ($pow && $project) {
            $project->status = 'ongoing';
            $project->save();
        }


        PowSuspendResume::create([
            'pow_id' => $this->powId,
            'transaction' => 'resumed',
            'user_id' => Auth::id(),
            'created_at' => now(),
        ]);

        $this->dispatch('resumed-success');

        session()->flash('success', 'Project has been resumed successfully.');
    }

    public function render()
    {
        return view('livewire.resume-project');
    }
}
