<?php

namespace App\Http\Livewire;

use App\Models\Availability;
use App\Models\Performance;
use App\Models\Quality;
use App\Models\Target;
use Livewire\Component;
use Illuminate\Support\Carbon;

class ChartConfig extends Component
{
    public $availabilities;
    public $qualities;
    public $performances;
    public $targets;
    protected $listeners = ['ubahData' => 'changeData'];

    public function render()
    {
        return view('livewire.dashboard.chart-config');
    }

    public function changeData()
    {
        // $qualities = Performance::join('qualities', 'performances.id', '=' , 'qualities.ModelId')->select('qualities.ModelId','qualities.Status','performances.model')->get();
        $qualities = Quality::select('ModelId','Status')->whereDate('created_at', Carbon::today())->get();
        $availabilities = Availability::all();
        $performances = Performance::whereDate('timestamp', Carbon::today())->get();
        $targets = Target::whereDate('timestamp', Carbon::today())->orderBy('id', 'DESC')->get();
        $this->availabilities = $availabilities;
        // $this->qualities = $qualities;
        $this->qualities = $qualities;
        $this->performances = $performances;
        $this->targets = $targets;
        $this->emit('berhasilUpdate',[
            'qualities' => $this->qualities,
            'availabilities' => $this->availabilities,
            'performances' => $this->performances,
            'targets' => $this->targets
        ]);
    }
    // public function changeData()
    // {
    //     $this->emit('ubahDataQty');
    //     // $availabilities = Availability::whereDate('created_at', Carbon::today())->get();
    //     $availabilities = Availability::all();
    //     // $qualities = Quality::get();
    //     // $this->qualities = $qualities;
    //     $this->availabilities = $availabilities;
    //     $this->emit('berhasilUpdate',['availabilities' => $this->availabilities]);
    // }

  

}
