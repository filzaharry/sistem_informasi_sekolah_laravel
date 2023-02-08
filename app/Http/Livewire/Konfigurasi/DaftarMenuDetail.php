<?php

namespace App\Http\Livewire\Konfigurasi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Menus;
use App\Models\Icon;
use App\Models\AksesMenu;
use App\Models\UserLevels;
use Illuminate\Support\Facades\Auth;

class DaftarMenuDetail extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $title = 'Daftar Menu';
    public $subtitle;
    public $menu;
    public $menuId;
    public $isRead;
    public $isEdit;
    public $isDelete;
    public $isCreate;
    public $search;
    
    public $masterMenuId;

    public $deleteId;
    public $subMenuId;
    public $subMenuName;
    public $subMenuSort;
    public $subMenuIcon;
    public $subMenuStatus;
    
    protected $rules = [
        'subMenuName' => 'required|min:3',
        'subMenuSort' => 'required',
        'subMenuIcon' => 'required',
        'subMenuStatus' => 'required',
    ];


    public function closeModal()
    {
        $this->dispatchBrowserEvent('hide-form-delete');
    }

    public function showModalDelete($data)
    {
        $this->deleteId = $data['id'];
        $this->dispatchBrowserEvent('show-form-delete');
    }

    public function deleteSubMenu()
    {
        $getAllUserLevel = UserLevels::get();

        foreach ($getAllUserLevel as $i) {
            AksesMenu::where('menu_id', $this->deleteId)->delete();
        }

        Menus::where('id', $this->deleteId)->delete();

        session()->flash('success', 'Delete Sub Menu has been Successfully!');
        $this->dispatchBrowserEvent('hide-form-delete');

        return redirect('daftar-menu/'.$this->masterMenuId);
    }

    public function showModalEdit(Menus $subMenu)
    {
        $this->subMenuId = $subMenu['id'];
        $this->subMenuName = $subMenu['nama_menu'];
        $this->subMenuSort = $subMenu['sort'];
        $this->subMenuIcon = $subMenu['icon'];
        $this->subMenuStatus = $subMenu['aktif'];
        $this->dispatchBrowserEvent('show-form-edit');
    }

    public function editSubMenu()
    {
        Menus::where('id',$this->subMenuId)->update([
            'nama_menu' => $this->subMenuName,
            'master_menu' => $this->masterMenuId,
            'url' => str_replace(' ','-', strtolower($this->subMenuName)),
            'icon' => $this->subMenuIcon,
            'aktif' => $this->subMenuStatus == 1 ? "Y" : "N",
            'sort' => $this->subMenuSort,
        ]);

        session()->flash('success', 'Update Sub Menu has been Successfully!');
        $this->dispatchBrowserEvent('hide-form-edit');

        return redirect('daftar-menu/'.$this->masterMenuId);
    }

    public function showModalAdd()
    {
        $this->subMenuName = '';
        $this->subMenuSort = '';
        $this->subMenuIcon = '';
        $this->subMenuStatus = '';
        $this->dispatchBrowserEvent('show-form-add');
    }


    public function addSubMenu()
    {
        $this->validate();

        Menus::insert([
            'nama_menu' => $this->subMenuName,
            'level_menu' => 'sub_menu',
            'master_menu' => $this->masterMenuId,
            'url' => str_replace(' ','-', strtolower($this->subMenuName)),
            'icon' => $this->subMenuIcon,
            'aktif' => $this->subMenuStatus == 1 ? "Y" : "N",
            'sort' => $this->subMenuSort,
        ]);

        $getAllUserLevel = UserLevels::get();
        $getLastMenu = Menus::latest()->first();

        foreach ($getAllUserLevel as $i) {
            AksesMenu::create([
                'level_user_id' => $i->id,
                'menu_id' => $getLastMenu->id,
            ]);
        }

        session()->flash('success', 'Sub Menu has been successfully added.');
        $this->dispatchBrowserEvent('hide-form-add');

        return redirect('daftar-menu/'.$this->masterMenuId);
    }

    public function searchFunc($data)
    {

        $qry = "nama_menu like '".$data."%'";

       return $qry;
    }

    public function mount($id)
    {
        $this->masterMenuId = $id;
        $getMasterMenuName = Menus::select('nama_menu')->find($this->masterMenuId);
        $this->subtitle = $getMasterMenuName->nama_menu;
    }


    public function render()
    {
        $urlSegment = explode("/",url()->current());

        if(($urlSegment[3] == 'livewire')){
            $explodeSegment = explode('.',$urlSegment[5]);
            $replaceStrSegment = str_replace("-detail", "",$explodeSegment[1]);
            $segment = $replaceStrSegment;
        } else {
            $segment = $urlSegment[3];
        }

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
            $data = Menus::where('level_menu', 'sub_menu')->where('master_menu', $this->masterMenuId)->paginate(10);
        } else {
            $data = Menus::where('level_menu', 'sub_menu')->where('master_menu', $this->masterMenuId)->whereRaw($this->searchFunc($this->search))->paginate(10);
        }

        $iconList = Icon::where('status', 1)->get();

        return view('livewire.konfigurasi.daftarmenudetail.daftarmenudetail', [
            'data' => $data,
            'iconList' => $iconList,
            'title' =>$this->title,
            'subtitle' =>$this->subtitle
        ]);
    }
}



