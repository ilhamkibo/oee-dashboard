<?php

namespace App\Http\Livewire;

use App\Models\Availability;
use Livewire\Component;

class AvailabilityLog extends Component
{  
    public function render()
    {
        $availabilities = Availability::select('*', 'created_at AS waktu')->get();
       
        foreach ($availabilities as $availability) {
           $availability->waktu = date('Y-m-d', strtotime($availability->created_at));
        }

        if (request('filterDate')) {
            $availabilities = $availabilities->where('waktu', '=' , request('filterDate'));
        }

        return view('livewire.datalog.availability-log',[
            'availabilities' => $availabilities
        ])->extends('layouts.main')->section('content');
    }
}
