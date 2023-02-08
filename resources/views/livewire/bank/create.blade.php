<!-- Modal -->
<div class="modal fade" id="formAdd" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <form wire:submit.prevent="addEntries">
                <div class="modal-content">
                    <div class="modal-body">

                        <div class="card-body">
                            <h4 class="card-title">Create Entries</h4>
                            <p class="card-description"> For On The Spot </p>
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" wire:model="name"
                                        placeholder="Name">
                                    @error('name')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" wire:model="email"
                                        placeholder="Email">
                                    @error('email')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control" id="phone" wire:model="phone"
                                        placeholder="Phone">
                                    @error('phone')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group row ml-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios"
                                                id="optionsRadios1" value=""> Male <i
                                                class="input-helper"></i></label>
                                    </div>
                                    <div class="form-check ml-2">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios"
                                                id="optionsRadios2" value="option2" checked=""> Female <i
                                                class="input-helper"></i></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bank_id">Select Bank</label>
                                    <select class="form-control" id="bank_id" wire:model="bank_id">
                                        <option disabled selected>Choose</option>
                                        <option value="1">BNI</option>
                                    </select>
                                    @error('bank_id')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="event_id">Select Event</label>
                                    <select class="form-control" id="event_id" wire:model="event_id">
                                        <option disabled selected>Choose</option>
                                        <option value="1">MERAIH MIMPI</option>
                                    </select>
                                    @error('event_id')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="ticket_id">Select Ticket</label>
                                    <select class="form-control" id="ticket_id" wire:model="ticket_id">
                                        <option disabled selected>Choose</option>
                                        <option value="1">VIP</option>
                                        <option value="2">VVIP</option>
                                    </select>
                                    @error('ticket_id')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" wire:model="city"
                                        placeholder="City">
                                    @error('city')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            </form>
                        </div>


                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
