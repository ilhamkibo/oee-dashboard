<?php

namespace App\Http\Livewire;

use App\Models\Availability;
use Livewire\Component;

class DatalogIndex extends Component
{
    public function render()
    {
        return view('livewire.datalog-index')->extends('layouts.main')->section('content');
    }
    
}
