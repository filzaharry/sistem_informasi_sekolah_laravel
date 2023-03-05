<?php

namespace App\Http\Livewire\Kesiswaan;

use App\Models\AksesMenu;
use App\Models\Data\KelasM;
use App\Models\Menus;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Kelas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $title = 'Kelas';
    public $titleAdd = 'Tambah Kelas';
    public $titleEdit = 'Ubah Kelas';
    public $titleDelete = 'Hapus Kelas';
    public $titleDetail = 'Detail Kelas';

    public $menu;
    public $menuId;
    public $isRead;
    public $isEdit;
    public $isDelete;
    public $isCreate;
    public $search;

    public $deleteId;
    public $editId;

    public $kategori;
    public $kelas;
    public $clockin;
    public $clockout;

    public $kategoriList = [];

    protected $rules = [
        'kategori' => 'required',
        'kelas' => 'required',
        'clockin' => 'required',
        'clockout' => 'required',
    ];

    public function closeModal()
    {
        $this->dispatchBrowserEvent('hide-form-delete');
    }

    public function showModalAdd()
    {
        $this->kategori = '';
        $this->kelas = '';
        $this->clockin = '';
        $this->clockout = '';
        $this->dispatchBrowserEvent('show-form-add');
    }

    public function showModalEdit($data)
    {
        $this->editId = $data['id'];
        $this->kategori = $data['kategori'];
        $this->kelas = $data['kelas'];
        $this->clockin = $data['clockin'];
        $this->clockout = $data['clockout'];
        $this->dispatchBrowserEvent('show-form-edit');
    }

    public function showModalDelete($data)
    {
        $this->deleteId = $data['id'];
        $this->kelas = $data['kelas'];
        $this->dispatchBrowserEvent('show-form-delete');
    }

    public function deleteKelas()
    {
        KelasM::where('id', $this->deleteId)->update([
            'deleted_by' => Auth::user()->id,
            'deleted_at' => Carbon::now(),
        ]);

        session()->flash('success', $this->title.' Berhasil Dihapus.');
        $this->dispatchBrowserEvent('hide-form-delete');

        return redirect()->route('kelas');
    }

    public function editKelas()
    {
        KelasM::where('id',$this->editId)->update([
            'kategori' => $this->kategori,
            'kelas' => $this->kelas,
            'clockin' => $this->clockin,
            'clockout' => $this->clockout,
            'updated_by' => Auth::user()->id,
        ]);

        session()->flash('success', $this->title.' Berhasil Diubah');
        $this->dispatchBrowserEvent('hide-form-edit');

        return redirect('kelas');
    }


    public function addKelas()
    {
        $this->validate();

        KelasM::insert([
            'kategori' => $this->kategori,
            'kelas' => $this->kelas,
            'clockin' => $this->clockin,
            'clockout' => $this->clockout,
            'created_by' => Auth::user()->id,
        ]);

        session()->flash('success', $this->title.' Berhasil Ditambahkan.');
        $this->dispatchBrowserEvent('hide-form-add');

        return redirect('kelas');
    }

    public function searchFunc($data)
    {
        $qry = "kelas LIKE '".$data."%'";

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
            $data = KelasM::whereNull('deleted_by')->orderBy('id','desc')->paginate(10);
        } else {
            $data = KelasM::whereNull('deleted_by')->whereRaw($this->searchFunc($this->search))->orderBy('id','desc')->paginate(10);
        }

        $this->kategoriList = KelasM::select('kategori')->groupBy('kategori')->get();
        
        return view('livewire.kesiswaan.kelas.kelas', [
            'data' => $data
        ]);
    }
}
