<?php

use App\Http\Livewire\Konfigurasi\Icons;
use App\Http\Livewire\Konfigurasi\Genparams;
use App\Http\Livewire\Konfigurasi\Userlevel;
use App\Http\Livewire\Konfigurasi\Users;
use App\Http\Livewire\Konfigurasi\Menuaccess;
use App\Http\Livewire\Konfigurasi\DaftarMenu;
use App\Http\Livewire\Konfigurasi\DaftarMenuDetail;
use App\Http\Livewire\Home;
use App\Http\Livewire\Dashboard;

use App\Http\Livewire\Entries;
use App\Http\Livewire\Bank;
use App\Http\Livewire\Ticket;
use App\Http\Livewire\Event;
use App\Http\Livewire\EventDetail;
use App\Http\Livewire\Sponsorship;
use App\Http\Livewire\LandingPage;
use App\Http\Livewire\Components\LayoutLandingPage;

use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//            return redirect('login');
//     });


Route::group(['middleware' => 'auth'], function () {
    
    // Route::get('/entries', Entries::class)->name('entries')->middleware('auth');
    // Route::get('/bank', Bank::class)->name('bank')->middleware('auth');
    // Route::get('/ticket', Ticket::class)->name('ticket')->middleware('auth');
    // Route::get('/events', Event::class)->name('events')->middleware('auth');
    // Route::get('/events/{id}', EventDetail::class)->name('event-detail')->middleware('auth');
    // Route::get('/sponsorship', Sponsorship::class)->name('sponsorship')->middleware('auth');
    Route::get('/landingpage', LandingPage::class)->name('landingpage')->middleware('auth');
    // Route::get('/events/{id}/preview', EventDetail::class)->name('event-detail-preview')->middleware('auth');
    
    Route::get('/dashboard', Dashboard::class)->name('dashboard')->middleware('auth');
    Route::get('/daftar-menu', DaftarMenu::class)->name('daftar-menu')->middleware('auth');
    Route::get('/daftar-menu/{id}', DaftarMenuDetail::class)->name('daftar-menu-detail')->middleware('auth');
    Route::get('/users', Users::class)->name('users')->middleware('auth');
    Route::get('/user-level', Userlevel::class)->name('user-level')->middleware('auth');
    Route::get('/menuaccess/{id}', Menuaccess::class)->name('menuaccess')->middleware('auth');
    Route::get('/genparams', Genparams::class)->name('genparams')->middleware('auth');
    Route::get('/icons', Icons::class)->name('icons')->middleware('auth');
    
});
Route::group(['middleware' => 'checkUserLoggedIn'], function () {
    Route::get('/', LayoutLandingPage::class)->name('landing-page');
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});
