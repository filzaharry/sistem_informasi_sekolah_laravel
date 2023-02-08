<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Menus;
use App\Models\User;
use App\Models\EntriesM;
use App\Models\AksesMenu;
use Illuminate\Support\Facades\Auth;

class Entries extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $title = 'Entries';
    public $search;
    public $fromdate;
    public $todate;

    // payload
    public $name;
    public $email;
    public $phone;
    public $ticket;
    public $city;
    public $ticket_id;
    public $bank_id;
    public $event_id;

    protected $rules = [
        'name' => 'required',				
        'phone' => 'required',						
        'email' => 'required',			
        'city' => 'required',		
        'ticket_id' => 'required',
        'event_id' => 'required',
        'bank_id' => 'required'
    ];

    public function exportData()
    {
        $fileName = 'Export_Entries_Survei.csv';
        $tasks = SurveiEntries::
        select(
            'survei_entries.brand as brand',
            'survei_entries.phone as phone',
            'survei_entries.receipt as receipt',
            'survei_entries.receipt_date as receipt_date',
            'survei_entries.transc_time as transc_time',
            'survei_entries.updated_at as updated_at',
            'survei_products.product as p_name',
            'survei_products.category as p_category',
            'survei_products.sub_category as p_sub_category',
            'survei_entries.qty as qty',
            'survei_entries.price as price',
            'survei_retailer.name as r_name',
            'survei_retailer.category as r_category',
            'survei_entries.retailer_address as r_address',
            'survei_entries.kota as city',
            'survei_entries.prov as province',
        )
        ->leftJoin('survei_products','survei_entries.product_id','survei_products.id')
        ->leftJoin('survei_retailer','survei_entries.retailer_id','survei_retailer.id')
        ->orderBy('survei_entries.created_at', 'desc')
        ->get();


        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array(
            'Brand',
            'No. HP',
            'No. Receipt',
            'Tgl. Receipt',
            'Jam Transaksi',
            'Tgl Input',
            'Product',
            'Category',
            'Sub Category',
            'Qty',
            'Harga',
            'Retailer Name',
            'Retailer Name Category',
            'Retailer Address',
            'Kota',
            'Provinsi',
        );

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                if($task->brand == 1){
                    $brand = 'Bebelac';
                } elseif ($task->brand == 2){
                    $brand = 'Nutrilon';
                } else {
                    $brand = '';
                }
                
                $row['Brand'] = $task->brand;
                $row['No. HP'] = $task->phone;
                $row['No. Receipt'] = $task->receipt;
                $row['Tgl. Receipt'] = $task->receipt_date;
                $row['Jam Transaksi'] = $task->transc_time;
                $row['Tgl Input'] = $task->updated_at;
                $row['Product'] = $task->p_name;
                $row['Category'] = $task->p_category;
                $row['Sub Category'] = $task->p_sub_category;
                $row['Qty'] = $task->qty;
                $row['Harga'] = $task->price;
                $row['Retailer Name'] = $task->r_name;
                $row['Retailer Name Category'] = $task->r_category;
                $row['Retailer Address'] = str_replace(',',' ',$task->r_address);
                $row['Kota'] = $task->city;
                $row['Provinsi'] = $task->province;
               
                fputcsv($file, array(
                    $row['Brand'],
                    $row['No. HP'],
                    $row['No. Receipt'],
                    $row['Tgl. Receipt'],
                    $row['Jam Transaksi'],
                    $row['Tgl Input'],
                    $row['Product'],
                    $row['Category'],
                    $row['Sub Category'],
                    $row['Qty'],
                    $row['Harga'],
                    $row['Retailer Name'],
                    $row['Retailer Name Category'],
                    $row['Retailer Address'],
                    $row['Kota'],
                    $row['Provinsi']
                ));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function showModalAdd()
    {
        $this->dispatchBrowserEvent('show-form-add');
    }
    public function showModalFilter()
    {
        $this->dispatchBrowserEvent('show-form-filter');
    }
    public function showModalDetail()
    {
        $this->dispatchBrowserEvent('show-form-detail');
    }




    public function addEntries()
    {
        $this->validate();
        EntriesM::insert([
            'name' => $this->name,				
            'email' => $this->email,			
            'phone' => $this->phone,						
            'ticket_id' => $this->ticket_id,
            'event_id' => $this->event_id,
            'bank_id' => $this->bank_id,
            'gender' => 1, // belom		
            'city' => $this->city,		
            'is_ots' => 1, // 1 = ots		
            'status' => 2, // 2 = langsung di acc admin
            // 'createdById' => Auth::user()->id
        ]);

        session()->flash('success', 'Entries has been successfully added.');
        $this->dispatchBrowserEvent('hide-form-add');

        return redirect('survei-entries');
    }


    public function whereRaw()
    {
        $qry = '';
        if($this->search != null){
            $qry = "name LIKE '".$this->search."%'
            OR phone LIKE '".$this->search."%'
            OR email LIKE '".$this->search."%'
            OR city LIKE '".$this->search."%'
            AND ";
        }
        if($this->fromdate != null && $this->todate != null){
            $filterfromdate = implode(' ',[str_replace('-','/',$this->fromdate), '00:00:00']);
            $filtertodate = implode(' ',[str_replace('-','/',$this->todate), '23:59:00']);
            $qry = "DATE(created_at) BETWEEN '".$filterfromdate."' AND '".$filtertodate."' AND ";
        }
        $qryCustom = $qry.'id != 0';

        return $qryCustom;
    }

    public function render()
    {
        $segment = strtolower($this->title);

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
            $data = EntriesM::paginate(10);
        } else {
            $data = EntriesM::whereRaw($this->whereRaw())->paginate(10);
        }

        return view('livewire.entries.entries',[
            'data' => $data,
        ]);
    }
}
