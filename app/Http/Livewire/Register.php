<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Register extends Component
{
    public $username;
    public $error;

    protected $rules = [
        'username' => 'required|min:3',
        // 'email' => 'required|unique:users|email',
        // 'pass' => 'required|min:8|same:confirmPass',
        // 'confirmPass' => 'required'
    ];

    public function render()
    {
        return view('livewire.register')->layout('layouts.auth');
    }

    public function handleSubmit()
    {
       $this->validate();
       $hashPass = Hash::make('123123');

       $user = User::create([
           'name' => 'ryuki',
           'username' => $this->username,
           'email' => 'ryuki@test.com',
           'password' => $hashPass,
           'remember_token' => Str::random(40),
       ]);

       if($user){
            session()->flash('success','You are registered successfully!');
            return redirect(route('login'));
       } else {
            $this->username = ''; // kalo return redirect() tinggal kosongin aja valuenya
           return $this->error = "something went wrong";
       }

    }
}
