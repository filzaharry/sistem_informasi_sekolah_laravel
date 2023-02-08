<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Sidebar extends Component
{

    public function render()
    {
        $mainMenu = DB::table("akses")
        ->join('menu','menu.id','=','akses.menu_id')
        ->select('menu.*','akses.akses','akses.tambah','akses.edit','akses.hapus')
        ->where('akses.level_user_id', Auth::user()->level_user_id)
        ->where('menu.level_menu', 'main_menu')
        ->where('menu.aktif', 'Y')
        ->where('akses', 1)
        ->orderBy('sort', 'asc')
        ->get();

        $subMenu = DB::table("akses")
        ->join('menu','menu.id','=','akses.menu_id')
        ->select('menu.*','akses.akses','akses.tambah','akses.edit','akses.hapus')
        ->where('akses.level_user_id', Auth::user()->level_user_id)
        ->where('menu.level_menu', 'sub_menu')
        ->where('menu.aktif', 'Y')
        ->where('akses', 1)
        ->orderBy('sort_sub', 'asc')
        ->get();

        return view('livewire.components.sidebar', [
            'main_menu' => $mainMenu,
            'sub_menu' => $subMenu,
        ]);
    }
}
