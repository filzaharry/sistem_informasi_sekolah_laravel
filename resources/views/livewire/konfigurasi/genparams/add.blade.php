<!-- Modal -->
<div class="modal fade" id="formAdd" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form wire:submit.prevent="addGenParam">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="param">General Parameter Name</label>
                            <input type="text" class="form-control" id="nameParam" wire:model="nameParam">
                            @error('nameParam')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="param">Value</label>
                            <input type="text" class="form-control" id="valueParam" wire:model="valueParam">
                            @error('valueParam')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="param">Type</label>
                            <input type="number" class="form-control" id="typeParam" wire:model="typeParam">
                            @error('typeParam')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="statusParam"
                                    wire:model="statusParam">
                                <label for="statusParam" class="custom-control-label">Active Status</label>
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