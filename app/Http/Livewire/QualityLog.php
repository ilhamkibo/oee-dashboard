<?php

namespace App\Http\Livewire;

use App\Models\Performance;
use App\Models\Quality;
use Livewire\Component;
use Illuminate\Support\Facades\DB;


class QualityLog extends Component
{
    public function render()
    {
        // $qualities = Quality::with('kualitas')->orderBy('id');
        $qualities = Quality::select('Status','value_a','value_b','value_c','created_at','created_at AS waktu','Model')->get();
        // $qualities = Performance::join('qualities', 'performances.id', '=' , 'qualities.ModelId')->select('qualities.*','qualities.created_at AS waktu','performances.model')->get();
        
        
        foreach ($qualities as $quality) {
            // $quality->Image = 'data:image/jpeg;base64,' . base64_encode($quality->Image);
            $quality->waktu = date('Y-m-d', strtotime($quality->created_at));
        }
        // dd($quality->waktu);
        
        if (request('filterDate')) {
            $qualities = $qualities->where('waktu','=', request('filterDate'));
            // dd(request('filterDate'));
        }

        return view('livewire.datalog.quality-log',[
            'qualities' => $qualities
        ])->extends('layouts.main')->section('content');
    }
}
