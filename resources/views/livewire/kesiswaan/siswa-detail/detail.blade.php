.<div class="row">
    <div class="col-12">
        <div class=" ml-4">
            <div class="p-4">
                
                <div class="col-lg-12">
                    <div class="row mb-4">
                        <div class="col-lg-2 mr-4">
                            <img class="img-fluid rounded-circle" src="https://lzd-img-global.slatic.net/g/p/39e1aae1bf27d967d23f6a4c8a8fb083.png_720x720q80.png_.webp" alt="profile{{$detail->foto_profil}}">
                        </div>
                        <div class="col-lg-8">
                            <br>
                            <h1>{{$detail->nama}}</h1>
                            <p class="mb-0">NIS : {{$detail->nis}}</p>
                            <br>
                            <p class="mb-0">Tanggal Lahir : {{$detail->tgl_lahir}}</p>
                            <p class="mb-0">Tempat Lahir : Yogyakarta</p>
                            <p class="mb-0"><i class="icon-location-pin"></i> {{$detail->alamat}}</p>
                        </div>
                    </div>
                    <hr>
                    @include('livewire.kesiswaan.siswa-detail.walimurid')
                    @include('livewire.kesiswaan.siswa-detail.tab-detail')
                </div>
            </div>
        </div>
    </div>
</div>