<!-- Modal -->
<div class="modal fade" id="formAdd" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form wire:submit.prevent="addIcon">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nameIcon">Level User Name</label>
                            <input type="text" class="form-control form-control-sm" id="nameIcon" wire:model="nameIcon">
                            @error('nameIcon')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="statusIcon"
                                    wire:model="statusIcon">
                                <label for="statusIcon" class="custom-control-label">Active Status</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
