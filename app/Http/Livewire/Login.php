<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $username;
    public $password;
    public $error;

    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    public function render()
    {
        return view('livewire.login')->layout('layouts.auth');
    }

    public function handleSubmit()
    {
       $this->validate();
       if(Auth::attempt(['username'=>$this->username, 'password'=> $this->password])){
           session()->flash('success','You are logged in successfully, Welcome Back !');
           return redirect('dashboard');
       } else {
           $this->username = '';
           $this->password = '';
           return $this->error ="Invalid Username or Password";
       }


    }
}
