<!-- Modal -->
<div class="modal fade" id="formDelete" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <p class="display-5">{{$titleDelete}}</p>
                    <hr>
                    <h5>Apakah Anda yakin ingin menghapus {{$kelas}}?</h5>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button wire:click="closeModal" class="btn btn-sm btn-outline-secondary">Close</button>
                <button wire:click="deleteKelas" type="submit" class="btn btn-sm btn-outline-primary">Yes</button>
            </div>
        </div>

    </div>

</div>
