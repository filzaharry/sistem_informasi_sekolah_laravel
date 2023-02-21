<?php

namespace App\Http\Livewire\Konfigurasi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Menus;
use App\Models\User;
use App\Models\AksesMenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $title = 'Users';
    public $menu;
    public $deleteId;
    public $menuId;
    public $isRead;
    public $isEdit;
    public $isDelete;
    public $isCreate;
    public $search;
    public $defaultIcon;

    public $userId;
    public $email;
    public $username;
    public $fullname;
    public $level;
    public $password;
    public $repeatpassword;


    protected $rules = [
        'email' => 'required',
        'username' => 'required',
        'fullname' => 'required',
        'level' => 'required',
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

    public function deleteUser()
    {
        User::where('id', $this->deleteId)->delete();
        session()->flash('success', 'Delete User has been Successfully!');
        $this->dispatchBrowserEvent('hide-form-delete');

        return redirect('users');
    }

    public function showModalEdit(User $user)
    {

         $this->userId = $user['id'];
         $this->email = $user['email'];
         $this->username = $user['username'];
         $this->fullname = $user['name'];
         $this->level = $user['level_user_id'];

        $this->dispatchBrowserEvent('show-form-edit');
    }

    public function editUser()
    {
        $this->validate();

        $user = User::find($this->userId);

        if(!$this->password){

            $password = $user->password;

        } else {

            if($this->password != $this->repeatpassword){
                session()->flash('error', 'Password is not match with Repeat Password');
                $this->dispatchBrowserEvent('hide-form-edit');

                return redirect('users');
            }
        }

        User::where('id',$this->userId)->update([
            'email' => $this->email,
            'username' => $this->username,
            'name' => $this->fullname,
            'password' => Hash::make($password),
            'remember_token' => Str::random(40),
            'level_user_id' => $this->level
        ]);

        session()->flash('success', 'User has been successfully updated.');
        $this->dispatchBrowserEvent('hide-form-edit');

        return redirect('users');
    }

    public function showModalAdd()
    {
        $this->email = '';
        $this->username = '';
        $this->fullname = '';
        $this->level = '';
        $this->password = '';
        $this->repeatpassword = '';
        $this->dispatchBrowserEvent('show-form-add');
    }

    public function showModalFilter()
    {
        $this->dispatchBrowserEvent('show-form-filter');
    }


    public function addUser()
    {
        $this->validate();

        User::insert([
            'email' => $this->email,
            'username' => $this->username,
            'name' => $this->fullname,
            'password' => Hash::make($this->password),
            'remember_token' => Str::random(40),
            'level_user_id' => $this->level
        ]);

        session()->flash('success', 'User has been successfully added.');
        $this->dispatchBrowserEvent('hide-form-add');

        return redirect('users');
    }

    public function searchFunc($data)
    {

        $qry = "name LIKE '".$data."%' OR
                username LIKE '".$data."%' OR
                email LIKE '".$data."%'
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
            $data = User::paginate(10);
        } else {
            $data = User::whereRaw($this->searchFunc($this->search))->paginate(10);
        }

        return view('livewire.konfigurasi.users.users', [
            'data' => $data,
        ]);
    }
}
