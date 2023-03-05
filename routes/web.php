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

use App\Http\Livewire\LandingPage;
use App\Http\Livewire\Components\LayoutLandingPage;
use App\Http\Livewire\Kesiswaan\Kelas;
use App\Http\Livewire\Kesiswaan\MataPelajaran;
use App\Http\Livewire\Kesiswaan\Rapor;
use App\Http\Livewire\Kesiswaan\Siswa;
use App\Http\Livewire\Kesiswaan\SiswaDetail;
use App\Http\Livewire\Kesiswaan\Walimurid;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/landingpage', LandingPage::class)->name('landingpage')->middleware('auth');

    Route::get('/dashboard', Dashboard::class)->name('dashboard')->middleware('auth');
    Route::get('/daftar-menu', DaftarMenu::class)->name('daftar-menu')->middleware('auth');
    Route::get('/daftar-menu/{id}', DaftarMenuDetail::class)->name('daftar-menu-detail')->middleware('auth');
    Route::get('/users', Users::class)->name('users')->middleware('auth');
    Route::get('/user-level', Userlevel::class)->name('user-level')->middleware('auth');
    Route::get('/menuaccess/{id}', Menuaccess::class)->name('menuaccess')->middleware('auth');
    Route::get('/genparams', Genparams::class)->name('genparams')->middleware('auth');
    Route::get('/icons', Icons::class)->name('icons')->middleware('auth');



    Route::get('/siswa', Siswa::class)->name('siswa')->middleware('auth');
    Route::get('/siswa/{id}', SiswaDetail::class)->name('siswa-detail')->middleware('auth');
    Route::get('/mata-pelajaran', MataPelajaran::class)->name('mata-pelajaran')->middleware('auth');
    Route::get('/rapor', Rapor::class)->name('rapor')->middleware('auth');
    Route::get('/kelas', Kelas::class)->name('kelas')->middleware('auth');
    Route::get('/walimurid', Walimurid::class)->name('walimurid')->middleware('auth');
    // Route::get('/walimurid/{id}', WalimuridDetail::class)->name('walimurid-detail')->middleware('auth');
    
});

Route::group(['middleware' => 'checkUserLoggedIn'], function () {
    Route::get('/', LayoutLandingPage::class)->name('landing-page');
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');

    Route::get('/lp/news', LayoutLandingPage::class)->name('lp-news');
    Route::get('/lp/news/{id}', LayoutLandingPage::class)->name('lp-news-detail');
    Route::get('/lp/profile/{id}', LayoutLandingPage::class)->name('lp-profile');
    Route::get('/lp/pengumuman', LayoutLandingPage::class)->name('lp-pengumuman');
    Route::get('/lp/pengumuman/{id}', LayoutLandingPage::class)->name('lp-pengumuman-detail');
    Route::get('/lp/gallery', LayoutLandingPage::class)->name('lp-gallery');
});
