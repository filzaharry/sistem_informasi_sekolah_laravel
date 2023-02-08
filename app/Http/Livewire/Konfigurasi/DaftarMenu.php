<?php

namespace App\Http\Livewire\Konfigurasi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Menus;
use App\Models\Icon;
use App\Models\AksesMenu;
use App\Models\UserLevels;
use Illuminate\Support\Facades\Auth;

class DaftarMenu extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $title = 'Daftar Menu';
    public $menu;
    public $menuId;
    public $isRead;
    public $isEdit;
    public $isDelete;
    public $isCreate;
    public $search;
    
    public $deleteId;
    public $masterMenuId;
    public $masterMenuName;
    public $masterMenuSort;
    public $masterMenuIcon;
    public $isParent;
    public $masterMenuStatus;
    
    protected $rules = [
        'masterMenuName' => 'required|min:3',
        'masterMenuSort' => 'required',
        'masterMenuIcon' => 'required',
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

    public function deleteMasterMenu()
    {
        $getAllUserLevel = UserLevels::get();
        
        foreach ($getAllUserLevel as $i) {
            AksesMenu::where('menu_id', $this->deleteId)->delete();
        }

        Menus::where('id', $this->deleteId)->delete();

        session()->flash('success', 'Delete Menu has been Successfully!');
        $this->dispatchBrowserEvent('hide-form-delete');

        return redirect()->route('daftar-menu');
    }

    public function showModalEdit(Menus $masterMenu)
    {
        $this->masterMenuId = $masterMenu['id'];
        $this->masterMenuName = $masterMenu['nama_menu'];
        $this->masterMenuSort = $masterMenu['sort'];
        $this->masterMenuIcon = $masterMenu['icon'];
        $this->isParent = $masterMenu['is_parent'];
        $this->masterMenuStatus = $masterMenu['aktif'];
        $this->dispatchBrowserEvent('show-form-edit');
    }

    public function editMasterMenu()
    {
        Menus::where('id',$this->masterMenuId)->update([
            'nama_menu' => $this->masterMenuName,
            'level_menu' => 'main_menu',
            'master_menu' => 0,
            'url' => str_replace(' ','-', strtolower($this->masterMenuName)),
            'icon' => $this->masterMenuIcon,
            'aktif' => $this->masterMenuStatus == 1 ? "Y" : "N",
            'sort' => $this->masterMenuSort,
            'is_parent' => $this->isParent,
        ]);

        session()->flash('success', 'Update Menu has been Successfully!');
        $this->dispatchBrowserEvent('hide-form-edit');

        return redirect('daftar-menu');
    }

    public function showModalAdd()
    {
        $this->masterMenuName = '';
        $this->masterMenuSort = '';
        $this->masterMenuIcon = '';
        $this->isParent = '';
        $this->masterMenuStatus = '';
        $this->dispatchBrowserEvent('show-form-add');
    }


    public function addMasterMenu()
    {
        $this->validate();

        Menus::insert([
            'nama_menu' => $this->masterMenuName,
            'level_menu' => 'main_menu',
            'master_menu' => 0,
            'url' => str_replace(' ','-', strtolower($this->masterMenuName)),
            'icon' => $this->masterMenuIcon,
            'aktif' => $this->masterMenuStatus == 1 ? "Y" : "N",
            'sort' => $this->masterMenuSort,
            'is_parent' => is_null($this->isParent) ? 1 : 0,
        ]);

        $getAllUserLevel = UserLevels::get();
        $getLastMenu = Menus::latest()->first();

        foreach ($getAllUserLevel as $i) {
            AksesMenu::create([
                'level_user_id' => $i->id,
                'menu_id' => $getLastMenu->id,
            ]);
        }

        session()->flash('success', 'Master Menu has been successfully added.');
        $this->dispatchBrowserEvent('hide-form-add');

        return redirect('daftar-menu');
    }

    public function searchFunc($data)
    {

        $qry = "nama_menu like '".$data."%'";

       return $qry;
    }

    public function render()
    {
        $urlSegment = explode("/",url()->current());

        if(($urlSegment[3] == 'livewire')){
            $explodeSegment = explode('.',$urlSegment[5]);
            $segment = $explodeSegment[1];
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
            $data = Menus::where('level_menu', 'main_menu')->paginate(10);
        } else {
            $data = Menus::where('level_menu', 'main_menu')->whereRaw($this->searchFunc($this->search))->paginate(10);
        }

        $iconList = Icon::where('status', 1)->get();


        return view('livewire.konfigurasi.daftarmenu.daftarmenu', [
            'data' => $data,
            'iconList' => $iconList,
            'isRead' => $this->isRead,
            'isEdit' => $this->isEdit,
            'isDelete' => $this->isDelete,
            'isCreate' => $this->isCreate,
            'title' =>$this->title
        ]);
    }
}
