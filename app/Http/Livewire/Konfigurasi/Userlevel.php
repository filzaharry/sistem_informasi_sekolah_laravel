<?php

namespace App\Http\Livewire\Konfigurasi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Menus;
use App\Models\UserLevels;
use App\Models\AksesMenu;
use Illuminate\Support\Facades\Auth;

class UserLevel extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $title = 'User Level';
    public $menu;
    public $search;
    
    public $deleteId;
    public $userLevelId;
    public $menuId;
    public $isRead;
    public $isEdit;
    public $isDelete;
    public $isCreate;
    public $isExport;
    public $nameLevel;


    protected $rules = [
        'nameLevel' => 'required',
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

    public function deleteUserLevel()
    {
        $getAllMenus = Menus::get();
        
        foreach ($getAllMenus as $i) {
            AksesMenu::where('level_user_id', $this->deleteId)->delete();
        }

        UserLevels::where('id', $this->deleteId)->delete();
        session()->flash('success', 'Delete Level User has been Successfully!');
        $this->dispatchBrowserEvent('hide-form-delete');

        return redirect('user-level');
    }

    public function showModalEdit(UserLevels $user)
    {

         $this->userLevelId = $user['id'];
         $this->nameLevel = $user['nama_level_user'];

        $this->dispatchBrowserEvent('show-form-edit');
    }

    public function editUserLevel()
    {
        $this->validate();

        $user = UserLevels::find($this->userLevelId);

        UserLevels::where('id',$this->userLevelId)->update([
            'nama_level_user' => $this->nameLevel,
        ]);

        session()->flash('success', 'Level User has been successfully updated.');
        $this->dispatchBrowserEvent('hide-form-edit');

        return redirect('user-level');
    }

    public function showModalAdd()
    {
        $this->nameLevel = '';
        $this->dispatchBrowserEvent('show-form-add');
    }


    public function addUserLevel()
    {
        $this->validate();

        UserLevels::insert([
            'nama' => $this->nameLevel,
        ]);

        $dataMenu = Menus::get();
        $getLastUserLevel = UserLevels::latest()->first();

        foreach ($dataMenu as $i) {
            AksesMenu::create([
                'level_user_id' => $getLastUserLevel->id,
                'menu_id' => $i->id,
            ]);
        }


        session()->flash('success', 'User Level has been successfully added.');
        $this->dispatchBrowserEvent('hide-form-add');

        $this->nameLevel = '';

        return redirect('user-level');
    }

    public function searchFunc($data)
    {

        $qry = "nama_level_user like '".$data."%'";

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
        $this->isExport = $access->export;

        if($this->search == ''){
            $data = UserLevels::paginate(10);
        } else {
            $data = UserLevels::whereRaw($this->searchFunc($this->search))->paginate(10);
        }

        return view('livewire.konfigurasi.userlevel.userlevel', [
            'data' => $data,
        ]);
    }
}
