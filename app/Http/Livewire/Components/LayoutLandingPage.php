<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
// use App\Models\LandingPageM;

class LayoutLandingPage extends Component
{
    public $banner = [];
    
    public function render()
    {
        // $this->banner = LandingPageM::select('value')->where('type', '0')->get();
        return view('livewire.components.layout-landing-page');
    }
}
