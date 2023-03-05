<?php

namespace App\Http\Livewire\Kesiswaan;

use App\Models\Data\NilaiM;
use App\Models\Data\RaporM;
use App\Models\Data\SiswaM;
use App\Models\Data\WalimuridM;
use Livewire\Component;
use Livewire\WithPagination;

class SiswaDetail extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $title = 'Detail Siswa';
    public $detail;
    public $walimurid;
    public $nilai;
    public $rapor;

    public $isNilai = true;
    public $isRapor = false;
    

    public function tabNilai()
    {
        $this->isNilai = true;
        $this->isRapor = false;
    }


    public function tabRapor()
    {
        $this->isNilai = false;
        $this->isRapor = true;
    }

    public function mount($id)
    {
        $detail = SiswaM::find($id);
        $this->detail = $detail;   

        $this->walimurid = WalimuridM::find($detail->walimurid_id); 
    }
    
    public function render()
    {
        return view('livewire.kesiswaan.siswa-detail.siswa-detail');
    }
}
