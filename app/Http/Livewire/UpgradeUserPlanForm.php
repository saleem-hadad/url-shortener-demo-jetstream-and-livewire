<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpgradeUserPlanForm extends Component
{
    public function upgradeToPro()
    {
        auth()->user()->update(['plan' => 'premium']);
    }

    public function cancelPro()
    {
        auth()->user()->update(['plan' => 'free']);
    }

    public function render()
    {
        return view('livewire.upgrade-user-plan-form', [
            'currentPlan' => auth()->user()->plan
        ]);
    }
}
