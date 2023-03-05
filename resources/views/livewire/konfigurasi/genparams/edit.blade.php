<!-- Modal -->
<div class="modal fade" id="formEdit" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form wire:submit.prevent="editGenParam">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="param">General Parameter Name</label>
                            <input type="text" class="form-control form-control-sm" id="nameParam" wire:model="nameParam">
                        </div>
                        <div class="form-group">
                            <label for="param">Value</label>
                            <input type="text" class="form-control form-control-sm" id="valueParam" wire:model="valueParam">
                        </div>
                        <div class="form-group">
                            <label for="param">Type</label>
                            <input type="number" class="form-control form-control-sm" id="typeParam" wire:model="typeParam">
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
