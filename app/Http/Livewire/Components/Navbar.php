<?php

namespace App\Http\Livewire\Components;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.components.navbar');
    }

    public function logoutUser()
    {
        Auth::logout();

        session()->flash('success', 'you are logout success');
        return redirect(route('login'));
    }
}
