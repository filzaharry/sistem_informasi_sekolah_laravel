<!-- Modal -->
<div class="modal fade" id="formFilter" tabindex="-1" role="dialog" wire:ignore.self>>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">
                    <h4 class="card-title">Filter Event</h4>
                    <div class="form-group">
                        <label for="fromdate">From Date</label>
                        <input type="date" class="form-control" id="fromdate" wire:model="fromdate">
                    </div>
                    <div class="form-group">
                        <label for="todate">To Date</label>
                        <input type="date" class="form-control" id="todate" wire:model="todate">
                    </div>

                    <button type="button" style="float: right;" class="btn btn-outline-primary btn-sm"
                        data-bs-dismiss="modal">Filter</button>
                </div>
            </div>
        </div>
    </div>
</div>
