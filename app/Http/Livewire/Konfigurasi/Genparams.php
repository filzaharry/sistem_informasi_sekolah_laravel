<?php

namespace App\Http\Livewire\Konfigurasi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Menus;
use App\Models\User;
use App\Models\GeneralParam;
use App\Models\UserLevels;
use App\Models\AksesMenu;
use Illuminate\Support\Facades\Auth;

class Genparams extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $title = 'General Parameter';
    public $menu;
    public $menuId;
    public $isRead;
    public $isEdit;
    public $isDelete;
    public $isCreate;
    public $search;
    
    public $deleteId;
    public $genParamId;
    public $nameParam;
    public $valueParam;
    public $typeParam;
    public $statusParam;


    protected $rules = [
        'nameParam' => 'required',
        'valueParam' => 'required',
        'typeParam' => 'required',
        'statusParam' => 'required',
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

    public function deleteGenParam()
    {
        GeneralParam::where('id', $this->deleteId)->delete();
        session()->flash('success', 'Delete General Parameter has been Successfully!');
        $this->dispatchBrowserEvent('hide-form-delete');

        return redirect('genparams');
    }

    public function showModalEdit(GeneralParam $genParam)
    {

         $this->genParamId = $genParam['id'];
         $this->nameParam = $genParam['param'];
         $this->valueParam = $genParam['value'];
         $this->typeParam = $genParam['type'];
         $this->statusParam = $genParam['status'];

        $this->dispatchBrowserEvent('show-form-edit');
    }

    public function editGenParam()
    {
        $this->validate();

        GeneralParam::where('id',$this->genParamId)->update([
            'param' => $this->nameParam,
            'value' => $this->valueParam,
            'type' => $this->typeParam,
            'status' => $this->statusParam,
        ]);

        session()->flash('success', 'General Parameter has been successfully updated.');
        $this->dispatchBrowserEvent('hide-form-edit');

        return redirect('genparams');
    }

    public function showModalAdd()
    {
        $this->dispatchBrowserEvent('show-form-add');
    }

    public function showModalFilter()
    {
        $this->dispatchBrowserEvent('show-form-filter');
    }


    public function addGenParam()
    {
        $this->validate();

        GeneralParam::insert([
            'param' => $this->nameParam,
            'value' => $this->valueParam,
            'type' => $this->typeParam,
            'status' => $this->statusParam,
        ]);

        session()->flash('success', 'General Parameter has been successfully added.');
        $this->dispatchBrowserEvent('hide-form-add');

        $this->nameParam = '';
        $this->valueParam = '';
        $this->typeParam = '';
        $this->statusParam = '';

        return redirect('genparams');
    }

    public function searchFunc($data)
    {

        $qry = "param like '".$data."%' OR
                value like '".$data."%' OR
                type like '".$data."%'
        ";

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
            $data = GeneralParam::paginate(10);
        } else {
            $data = GeneralParam::whereRaw($this->searchFunc($this->search))->paginate(10);
        }

        return view('livewire.konfigurasi.genparams.genparams', [
            'data' => $data,
        ]);
    }
}
