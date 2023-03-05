<!-- Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form wire:submit.prevent="filter">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-normal" id="modalLabel">
                        Filter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-static my-3">
                                <label>From Date</label>
                                <input type="date" class="form-control form-control-sm" wire:model.defer="fromdate">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group input-group-static my-3">
                                <label>To Date</label>
                                <input type="date" class="form-control form-control-sm" wire:model.defer="todate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancel</button>
                    {{-- <a type="submit" class="btn bg-gradient-primary">Submit</a> --}}
                    <button type="submit" class="btn bg-gradient-primary">Save Change</button>
                </div>
            </form>
        </div>
    </div>
</div>
