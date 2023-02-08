<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Menus;
use App\Models\User;
use App\Models\BankM;
use App\Models\AksesMenu;
use Illuminate\Support\Facades\Auth;

class Bank extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $title = 'Bank';
    public $search;
    public $fromdate;
    public $todate;

    public function whereRaw()
    {
        $qry = '';
        if($this->search != null){
            $qry = "name LIKE '".$this->search."%'
            OR desc LIKE '".$this->search."%'
            AND ";
        }
        if($this->fromdate != null && $this->todate != null){
            $filterfromdate = implode(' ',[str_replace('-','/',$this->fromdate), '00:00:00']);
            $filtertodate = implode(' ',[str_replace('-','/',$this->todate), '23:59:00']);
            $qry = "DATE(created_at) BETWEEN '".$filterfromdate."' AND '".$filtertodate."' AND ";
        }
        $qryCustom = $qry.'id != 0';

        return $qryCustom;
    }


    public function render()
    {
        $segment = strtolower($this->title);

        $menu = Menus::select('id')->where('url', $segment)->first();
        $this->menuId = $menu->id;

        $access = AksesMenu::where('level_user_id', Auth::user()
                    ->level_user_id)
                    ->where('menu_id', $this->menuId)
                    ->first();

        $this->isRead = $access->akses;
        $this->isEdit = $access->edit;
        $this->isDelete = $access->hapus;
        $this->isCreate = $access->tambah;

        if($this->search == ''){
            $data = BankM::paginate(10);
        } else {
            $data = BankM::whereRaw($this->whereRaw())->paginate(10);
        }

        return view('livewire.bank.bank',[
            'data' => $data,
        ]);
    }
}
