<!-- Modal -->
<div class="modal fade" id="formAdd" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <form wire:submit.prevent="addWalimurid">
                <div class="modal-body">
                    <div class="container">
                        <p class="display-5">{{$titleAdd}}</p>
                        <hr>
                        <div class="form-group">
                            <label for="nama">Nama Walimurid</label>
                            <input type="text" class="form-control form-control-sm" id="nama" wire:model="nama">
                            @error('nama')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" wire:model="gender" id="optionsRadios1" value="0" checked=""> Bapak <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" wire:model="gender" id="optionsRadios2" value="1"> Ibu <i class="input-helper"></i></label>
                            </div>
                            @error('gender')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No. Telp / WA</label>
                            <input type="number" class="form-control form-control-sm" id="no_telp" wire:model="no_telp">
                            @error('no_telp')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_ktp">No. KTP</label>
                            <input type="number" class="form-control form-control-sm" id="no_ktp" wire:model="no_ktp">
                            @error('no_ktp')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control form-control-sm" id="alamat" wire:model="alamat">
                            @error('alamat')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label>Single select box using select 2</label>
                            <select class="js-example-basic-single select2-hidden-accessible" style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                              <option value="AL" data-select2-id="3">Alabama</option>
                              <option value="WY">Wyoming</option>
                              <option value="AM">America</option>
                              <option value="CA">Canada</option>
                              <option value="RU">Russia</option>
                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-m6da-container"><span class="select2-selection__rendered" id="select2-m6da-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-outline-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
