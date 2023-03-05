<?php

namespace App\Http\Livewire\Kesiswaan;

use App\Models\AksesMenu;
use App\Models\Data\KelasM;
use App\Models\Data\SiswaM;
use App\Models\Data\WalimuridM;
use App\Models\Menus;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Siswa extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $title = 'Siswa';
    public $titleAdd = 'Tambah Siswa';
    public $titleEdit = 'Ubah Siswa';
    public $titleDelete = 'Hapus Siswa';
    public $titleDetail = 'Detail Siswa';

    public $menu;
    public $menuId;
    public $isRead;
    public $isEdit;
    public $isDelete;
    public $isCreate;
    public $search;

    public $deleteId;
    public $editId;

    public $walimuridList = [];
    public $kelasList = [];

    public $foto_profil;
    public $nis;
    public $nama;
    public $tgl_lahir;
    public $tempat_lahir;
    public $alamat;
    public $gender;
    public $no_telp;
    public $kelas_id;
    public $walimurid_id;

    protected $rules = [
        'foto_profil' => 'required',
        'nis' => 'required',
        'nama' => 'required',
        'tgl_lahir' => 'required',
        'tempat_lahir' => 'required',
        'alamat' => 'required',
        'gender' => 'required',
        'kelas_id' => 'required',
        'walimurid_id' => 'required',
    ];

    public function showModalAdd()
    {
        $this->foto_profil = '';
        $this->nis = '';
        $this->nama = '';
        $this->tgl_lahir = '';
        $this->tempat_lahir = '';
        $this->alamat = '';
        $this->gender = '';
        $this->no_telp = '';
        $this->kelas_id = '';
        $this->walimurid_id = '';
        $this->dispatchBrowserEvent('show-form-add');
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
            $data = SiswaM::orderBy('id','desc')->paginate(10);
        } else {
            $data = SiswaM::whereRaw($this->searchFunc($this->search))->orderBy('id','desc')->paginate(10);
        }

        $this->walimuridList = WalimuridM::get();
        $this->kelasList = KelasM::get();
        
        return view('livewire.kesiswaan.siswa.siswa', [
            'data' => $data
        ]);
    }
}
