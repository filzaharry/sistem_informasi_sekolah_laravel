<?php

namespace App\Http\Livewire\Konfigurasi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Icon;
use App\Models\Menus;
use App\Models\UserLevels;
use App\Models\AksesMenu;
use Illuminate\Support\Facades\Auth;

class Icons extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $title = 'Icons';
    public $menu;
    public $menuId;
    public $search;
    
    public $deleteId;
    public $iconId;
    public $isRead;
    public $isEdit;
    public $isDelete;
    public $isCreate;
    public $isDetail;
    public $nameIcon;
    public $statusIcon;
    
    protected $rules = [
        'nameIcon' => 'required',
        'statusIcon' => 'required',
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

    public function deleteIcon()
    {   
        Icon::where('id', $this->deleteId)->delete();
        session()->flash('success', 'Delete Icon has been Successfully!');
        $this->dispatchBrowserEvent('hide-form-delete');

        return redirect('icons');
    }

    public function showModalEdit(Icon $icon)
    {
        
         $this->iconId = $icon['id'];
         $this->nameIcon = $icon['name'];
         $this->statusIcon = $icon['status'];

        $this->dispatchBrowserEvent('show-form-edit');
    }

    public function editIcon()
    {
        $this->validate();

        Icon::where('id',$this->iconId)->update([
            'name' => $this->nameIcon,
            'status' => $this->statusIcon,
        ]);

        session()->flash('success', 'Icon has been successfully updated.');
        $this->dispatchBrowserEvent('hide-form-edit');

        return redirect('icons');
    }

    public function showModalAdd()
    {
        $this->nameIcon = '';
        $this->statusIcon = '';
        $this->dispatchBrowserEvent('show-form-add');
    }


    public function addIcon()
    {
        $this->validate();

        Icon::insert([
            'name' => $this->nameIcon,
            'status' => $this->statusIcon,
        ]);

        session()->flash('success', 'Icon has been successfully added.');
        $this->dispatchBrowserEvent('hide-form-add');

        $this->nameIcon = '';

        return redirect('icons');
    }

    public function searchFunc($data)
    {

        $qry = "name like '".$data."%'";

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
        $this->isDetail = $access->detail;

        if($this->search == ''){
            $data = Icon::paginate(10);
        } else {
            $data = Icon::whereRaw($this->searchFunc($this->search))->paginate(10);
        }

        return view('livewire.konfigurasi.icons.icons', [
            'data' => $data,
            'isRead' => $this->isRead,
            'isEdit' => $this->isEdit,
            'isDelete' => $this->isDelete,
            'isCreate' => $this->isCreate,
            'title' =>$this->title
        ]);
    }
}
