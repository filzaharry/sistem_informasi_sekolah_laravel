<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use App\Models\Transc_Log;
use App\Models\LogDeviceTable;
use App\Models\MasterDeviceTable;

class Dashboard extends Component
{

    
    public function mount()
    {
        
    }


    public function render()
    {
        return view('livewire.dashboard.dashboard');
    }
}
