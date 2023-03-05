<!-- Modal -->
<div class="modal fade" id="formAdd" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <form wire:submit.prevent="addSiswa" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap Siswa</label>
                            <input type="text" class="form-control form-control-sm" id="nama" wire:model="nama">
                            @error('nama')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto_profil">Upload Foto Siswa</label>
                            <input type="file" class="form-control form-control-sm" id="foto_profil" wire:model="foto_profil">
                            @error('foto_profil')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="text" class="form-control form-control-sm" id="nis" wire:model="nis">
                            @error('nis')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control form-control-sm" id="tgl_lahir" wire:model="tgl_lahir">
                            @error('tgl_lahir')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="date" class="form-control form-control-sm" id="tempat_lahir" wire:model="tempat_lahir">
                            @error('tempat_lahir')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control form-control-sm" id="alamat" wire:model="alamat">
                            @error('alamat')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No Telp (opsional)</label>
                            <input type="number" class="form-control form-control-sm" id="no_telp" wire:model="no_telp">
                            @error('no_telp')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" wire:model="gender" id="optionsRadios1" value="0" checked=""> Laki-laki <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" wire:model="gender" id="optionsRadios2" value="1"> Perempuan <i class="input-helper"></i></label>
                            </div>
                            @error('gender')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control form-control-sm js-example-basic-single" style="width:100%">
                                @foreach ($kelasList as $kls)
                                    <option value="{{$kls->id}}">{{$kls->kategori}}-{{$kls->kelas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Walimurid</label>
                            <select class="form-control form-control-sm js-example-basic-single" style="width:100%">
                                @foreach ($walimuridList as $wali)
                                    <option value="{{$wali->id}}">{{$wali->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-outline-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
