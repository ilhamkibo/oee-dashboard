<?php

namespace App\Http\Livewire;

use App\Models\Availability;
use App\Models\User;
use Livewire\Component;

class DashboardIndex extends Component
{
    
    

    public function render(User $user)
    {
        return view('livewire.dashboard.dashboard-index',[
            'header' => 'Dashboard'
        ])->extends('layouts.main')->section('content');
    }

   
}
