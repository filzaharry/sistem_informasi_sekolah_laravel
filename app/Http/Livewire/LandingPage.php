<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Menus;
use App\Models\User;
use App\Models\EventM;
use App\Models\LandingPageM;
use App\Models\AksesMenu;
use Illuminate\Support\Facades\Auth;

class LandingPage extends Component
{
    protected $paginationTheme = 'bootstrap';

    public $title = 'Landing Page Customize';
    public $segment = 'landingpage';
    public $search;
    public $fromdate;
    public $todate;
    public $menuId;

    public function showModalAdd()
    {
        $this->dispatchBrowserEvent('show-form-add');
    }
    public function showModalFilter()
    {
        $this->dispatchBrowserEvent('show-form-filter');
    }
    public function showModalDetail()
    {
        $this->dispatchBrowserEvent('show-form-detail');
    }

    public function render()
    {
        $segment = strtolower($this->segment);

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


        $data = LandingPageM::paginate(5);
        return view('livewire.landingpage.landingpage', [
            'data'=>$data
        ]);
    }
}
