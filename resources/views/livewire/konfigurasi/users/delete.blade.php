<!-- Modal -->
<div class="modal fade" id="formDelete" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">
                    <h5>Are You Sure Delete This User ?</h5>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button wire:click="closeModal" class="btn btn-secondary">Close</button>
                <button wire:click="deleteUser" type="submit" class="btn btn-primary">Yes</button>
            </div>
        </div>

    </div>

</div>
