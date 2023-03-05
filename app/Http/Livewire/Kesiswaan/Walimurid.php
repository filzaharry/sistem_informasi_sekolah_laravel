<?php

namespace App\Http\Livewire\Kesiswaan;

use App\Models\AksesMenu;
use App\Models\Data\SiswaM;
use App\Models\Data\WalimuridM;
use App\Models\Menus;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Walimurid extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $title = 'Walimurid';
    public $titleAdd = 'Tambah Walimurid';
    public $titleEdit = 'Ubah Walimurid';
    public $titleDelete = 'Hapus Walimurid';
    public $titleDetail = 'Detail Walimurid';

    public $menu;
    public $menuId;
    public $isRead;
    public $isEdit;
    public $isDelete;
    public $isCreate;
    public $search;

    public $deleteId;
    public $editId;

    public $no_ktp;
    public $no_telp;
    public $nama;
    public $gender;

    public $provinsi;
    public $kabupaten;
    public $kecamatan;
    public $kelurahan;
    public $alamat;

    public $dataSiswa = [];

    protected $rules = [
        'nama' => 'required',
        'no_ktp' => 'required',
        'no_telp' => 'required',
        'gender' => 'required',
        'alamat' => 'required',
    ];

    public function closeModal()
    {
        $this->dispatchBrowserEvent('hide-form-delete');
    }


    public function showModalEdit($data)
    {
        $this->editId = $data['id'];
        $this->nama = $data['nama'];
        $this->no_ktp = $data['no_ktp'];
        $this->no_telp = $data['no_telp'];
        $this->gender = $data['gender'];
        $this->alamat = $data['alamat'];
        $this->dispatchBrowserEvent('show-form-edit');
    }

    public function showModalDetail($data)
    {
        $this->nama = $data['nama'];
        $this->no_ktp = $data['no_ktp'];
        $this->no_telp = $data['no_telp'];
        $this->gender = $data['gender'];
        $this->alamat = $data['alamat'];

        $dataSiswa = SiswaM::where('walimurid_id', $data['id'])->get();
        $this->dataSiswa = $dataSiswa;
        $this->dispatchBrowserEvent('show-form-detail');
    }

    public function showModalDelete($data)
    {
        $this->deleteId = $data['id'];
        $this->nama = $data['nama'];
        $this->dispatchBrowserEvent('show-form-delete');
    }

    public function showModalAdd()
    {
        $this->nama = '';
        $this->no_ktp = '';
        $this->no_telp = '';
        $this->gender = '';
        $this->alamat = '';
        $this->dispatchBrowserEvent('show-form-add');
    }

    public function editWalimurid()
    {
        WalimuridM::where('id',$this->editId)->update([
            'alamat' => $this->alamat,
            'gender' => $this->gender,
            'no_ktp' => $this->no_ktp,
            'nama' => $this->nama,
            'no_telp' => $this->no_telp,
            'updated_by' => Auth::user()->id,
        ]);

        session()->flash('success', $this->title.' Berhasil Diubah');
        $this->dispatchBrowserEvent('hide-form-edit');

        return redirect('walimurid');
    }

    public function deleteWalimurid()
    {
        WalimuridM::where('id', $this->deleteId)->update([
            'deleted_by' => Auth::user()->id,
            'deleted_at' => Carbon::now(),
        ]);

        session()->flash('success', $this->title.' Berhasil Dihapus.');
        $this->dispatchBrowserEvent('hide-form-delete');

        return redirect()->route('walimurid');
    }

    public function addWalimurid()
    {
        $this->validate();

        WalimuridM::insert([
            'alamat' => $this->alamat,
            'gender' => $this->gender,
            'no_ktp' => $this->no_ktp,
            'nama' => $this->nama,
            'no_telp' => $this->no_telp,
            'created_by' => Auth::user()->id,

        ]);

        session()->flash('success', $this->title.' Berhasil Ditambahkan.');
        $this->dispatchBrowserEvent('hide-form-add');

        return redirect('walimurid');
    }

    public function searchFunc($data)
    {

        $qry = "nama LIKE '".$data."%'";

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
            $data = WalimuridM::whereNull('deleted_by')->orderBy('id','desc')->paginate(10);
        } else {
            $data = WalimuridM::whereNull('deleted_by')->whereRaw($this->searchFunc($this->search))->orderBy('id','desc')->paginate(10);
        }
        return view('livewire.kesiswaan.walimurid.walimurid', [
            'data' => $data
        ]);
    }
}
