<?php

namespace App\Http\Livewire\Konfigurasi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Menus;
use App\Models\User;
use App\Models\UserLevels;
use App\Models\AksesMenu;
use Illuminate\Support\Facades\Auth;

class Menuaccess extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $title = 'Menu Access';
    public $checkAllRow = false;
    public $menu;
    public $deleteId;
    public $menuId;
    public $isRead;
    public $isEdit;
    public $isDelete;
    public $isCreate;
    public $search;

    public $readChecked;
    public $readValue;

    public $createChecked;
    public $createValue;

    public $editChecked;
    public $editValue;

    public $deleteChecked;
    public $deleteValue;

    public $exportChecked;
    public $exportValue;

    public $userLevel;

    public $getLevel;

    public $selectedPerRow;
    public $selectedAllRow;

    public function allRowChecked()
    {
        $checkAllRow = AksesMenu::where('level_user_id', $this->getLevel)
        ->where('akses',0)
        ->where('tambah', 0)
        ->where('edit', 0)
        ->where('hapus', 0)
        ->where('export', 0)
        ->count();

        if($checkAllRow == 0){
            AksesMenu::where('level_user_id', $this->getLevel)->update([
                'akses' => 0,
                'tambah' => 0,
                'edit' => 0,
                'hapus' => 0,
                'export' => 0
            ]);
        } elseif($checkAllRow != 0) {
            AksesMenu::where('level_user_id', $this->getLevel)->update([
                'akses' => 1,
                'tambah' => 1,
                'edit' => 1,
                'hapus' => 1,
                'export' => 1
            ]);
        }

        

        return redirect('menuaccess/'.$this->getLevel);
    }
    public function allChecked($data)
    {
        if(
            $data['akses'] == 0 && 
            $data['tambah'] == 0 &&
            $data['edit'] == 0 &&
            $data['hapus'] == 0 &&
            $data['export'] == 0 
            ){
            AksesMenu::where('id', $data['id'])->update([
                'akses' => 1,
                'tambah' => 1,
                'edit' => 1,
                'hapus' => 1,
                'export' => 1
            ]);
        } elseif(
            $data['akses'] == 1 && 
            $data['tambah'] == 1 &&
            $data['edit'] == 1 &&
            $data['hapus'] == 1 &&
            $data['export'] == 1 
        )  {
            AksesMenu::where('id', $data['id'])->update([
                'akses' => 0,
                'tambah' => 0,
                'edit' => 0,
                'hapus' => 0,
                'export' => 0
            ]);
        
        } else {
            AksesMenu::where('id', $data['id'])->update([
                'akses' => 1,
                'tambah' => 1,
                'edit' => 1,
                'hapus' => 1,
                'export' => 1
            ]);
        }
        return redirect('menuaccess/'.$this->getLevel);
    }

    public function readChecked($data)
    {
        $this->readValue = $data['akses'] == '1' ? '0' : '1';

        AksesMenu::where('id', $data['id'])->update([
            'akses' => $this->readValue
        ]);
        return redirect('menuaccess/'.$this->getLevel);
    }
    public function createChecked($data)
    {
        $this->createValue = $data['tambah'] == '1' ? '0' : '1';

        AksesMenu::where('id', $data['id'])->update([
            'tambah' => $this->createValue
        ]);
        return redirect('menuaccess/'.$this->getLevel);
    }
    public function editChecked($data)
    {
        $this->editValue = $data['edit'] == '1' ? '0' : '1';

        AksesMenu::where('id', $data['id'])->update([
            'edit' => $this->editValue
        ]);
        return redirect('menuaccess/'.$this->getLevel);
    }
    public function deleteChecked($data)
    {
        $this->deleteValue = $data['hapus'] == '1' ? '0' : '1';

        AksesMenu::where('id', $data['id'])->update([
            'hapus' => $this->deleteValue
        ]);
        return redirect('menuaccess/'.$this->getLevel);
    }
    public function exportChecked($data)
    {
        $this->exportValue = $data['export'] == '1' ? '0' : '1';

        AksesMenu::where('id', $data['id'])->update([
            'export' => $this->exportValue
        ]);
        return redirect('menuaccess/'.$this->getLevel);
    }



    public function searchFunc($data)
    {

        $qry = "menu.nama_menu LIKE '".$data."%'
        ";

       return $qry;
    }

    public function selectCustom()
    {
        $qry = "akses.id as id,
            menu.nama_menu as nama,
            menu.master_menu as master,
            menu.url as url,
            akses.akses as akses,
            akses.tambah as tambah,
            akses.edit as edit,
            akses.hapus as hapus,
            akses.export as export
        ";

        return $qry;
    }

    public function mount($id)
    {
        $this->getLevel = $id;
        $qryGetNameLevel = UserLevels::find($id);
        
        $this->userLevel = $qryGetNameLevel->nama;
    }


    public function render()
    {

        $mainMenu = Aksesmenu::join('menu','menu.id','=','akses.menu_id')
                ->select('menu.*','akses.akses','akses.tambah','akses.edit','akses.hapus')
                ->where('akses.level_user_id', Auth::user()->level_user_id)
                ->where('menu.level_menu', 'main_menu')
                ->where('menu.aktif', 'Y')
                ->where('akses', 1)
                ->orderBy('sort', 'asc')
                ->get();

        $data = Aksesmenu::selectRaw($this->selectCustom())->leftJoin('menu','akses.menu_id','=','menu.id')->orderBy('menu.sort', 'desc')->get();

        $allRow = Aksesmenu::count();
        $selectedAllRow = Aksesmenu::where('level_user_id', $this->getLevel)
                        ->where('akses',1)
                        ->where('tambah', 1)
                        ->where('edit', 1)
                        ->where('hapus', 1)
                        ->where('export', 1)
                        ->count();

        if ($selectedAllRow == $allRow) {
            $this->checkAllRow = true;
        }

        return view('livewire.konfigurasi.menuaccess.menuaccess', [
            'checkAllRow' => $this->checkAllRow,
            'mainMenu' => $mainMenu,
            'data' => $data,
            'title' =>$this->title,
            'userLevel' => $this->userLevel
        ]);
    }
}
