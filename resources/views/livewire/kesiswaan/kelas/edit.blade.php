<!-- Modal -->
<div class="modal fade" id="formEdit" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <form wire:submit.prevent="editKelas">
                <div class="modal-body">
                    <div class="container">
                        <p class="display-5">{{$titleEdit}}</p>
                        <hr>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control form-control-sm" id="kategori" wire:model="kategori">
                              <option value="TK">TK</option>
                              <option value="SD">SD</option>
                              <option value="SMP">SMP</option>
                              <option value="SMA/SMK">SMA/SMK</option>
                            </select>
                            @error('kategori')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kelas">Nama Kelas</label>
                            <input type="number" class="form-control form-control-sm" id="kelas" wire:model="kelas">
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
