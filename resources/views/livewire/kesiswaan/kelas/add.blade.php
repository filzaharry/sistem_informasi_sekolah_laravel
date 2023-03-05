
<!-- Modal -->
<div class="modal fade" id="formAdd" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <form wire:submit.prevent="addKelas">
                <div class="modal-body">
                    <div class="container">
                        <p class="display-5">{{$titleAdd}}</p>
                        <hr>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control form-control-sm js-example-basic-single" style="width:100%">
                                @foreach ($kategoriList as $kl)
                                    <option value="{{$kl->kategori}}">{{$kl->kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Nama Kelas</label>
                            <input type="text" maxlength="3" class="form-control form-control-sm" id="kelas" wire:model="kelas">
                            @error('kelas')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="clockin">Jam Masuk</label>
                            <input type="time" class="form-control form-control-sm" id="clockin" wire:model="clockin">
                            @error('clockin')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="clockout">Jam Pulang</label>
                            <input type="time" class="form-control form-control-sm" id="clockout" wire:model="clockout">
                            @error('clockout')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
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
