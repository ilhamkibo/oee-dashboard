<?php

namespace App\Http\Livewire;

use App\Models\Performance;
use Carbon\Carbon;
use Livewire\Component;

class PerformanceLog extends Component
{
    public function render()
    {
        $performances = Performance::select('model','ydoi','timestamp','timestamp AS waktu')->get();
       
        foreach ($performances as $performance) {
           $performance->timestamp = date('Y-m-d', strtotime($performance->timestamp));
        //    dd($performance->timestamp);
        }


        if (request('filterDate')) {
            $performances = $performances->where('timestamp','=', request('filterDate'));
        }

        return view('livewire.datalog.performance-log',[
            'performances' => $performances
        ])->extends('layouts.main')->section('content');
    }

}
