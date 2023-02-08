<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Menus;
use App\Models\User;
use App\Models\EventM;
use App\Models\SponsorshipM;
use App\Models\BankM;
use App\Models\TicketM;
use App\Models\AksesMenu;
use Illuminate\Support\Facades\Auth;

class EventDetail extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $title = 'Event Detail';
    public $search;
    public $detailId;
    public $fromdate;
    public $todate;
    public $detailEvent;
    public $sponsor;
    public $bank;


    public function render()
    {
        $urlSegment = explode("/",url()->current());
        $this->detailId = end($urlSegment);

        $this->detailEvent = EventM::where('id', $this->detailId)->first();
        $sponsorList = SponsorshipM::where('event_id', $this->detailId)->paginate(3);
        $bankList = BankM::where('event_id', $this->detailId)->paginate(3);
        $ticketList = TicketM::where('event_id', $this->detailId)->paginate(3);

        return view('livewire.event-detail.event-detail',[
            'sponsorList' => $sponsorList,
            'bankList' => $bankList,
            'ticketList' => $ticketList,
        ]);
    }
}