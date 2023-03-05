<!-- Modal -->
<div class="modal fade" id="formEdit" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form wire:submit.prevent="editUserLevel">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nameLevel">Level User Name</label>
                            <input type="text" class="form-control form-control-sm" id="nameLevel" wire:model="nameLevel">
                            @error('nameLevel')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
