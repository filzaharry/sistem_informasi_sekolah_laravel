<!-- Modal -->
<div class="modal fade" id="formAdd" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <form wire:submit.prevent="addEvent">
                <div class="modal-content">
                    <div class="modal-body">

                        <div class="card-body">
                            <h4 class="card-title">Add New Event</h4>
                            <p class="card-description">Add your event in here</p>

                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Select Event</label>
                                <select class="form-control" id="exampleFormControlSelect2">
                                    <option>Choose</option>
                                    <option>MERAIH MIMPI</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Title Header Event</label>
                                <input type="text" class="form-control" id="name" wire:model="name"
                                    placeholder="Name">
                                @error('name')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Slogan Header Event</label>
                                <input type="text" class="form-control" id="name" wire:model="name"
                                    placeholder="Description">
                                @error('name')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Domain Event</label>
                                <input type="text" class="form-control" id="name" wire:model="name"
                                    placeholder="www.example.com">
                                @error('name')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Image Logo 22 x 24</label>
                                <input class="form-control" type="file" id="myFile" name="filename">
                            </div>
                            <div class="form-group">
                                <label for="name">Image Header 782 x 256</label>
                                <input class="form-control" type="file" id="myFile" name="filename">
                            </div>
                            <div class="form-group">
                                <label for="name">Image Sidebar 782 x 256</label>
                                <input class="form-control" type="file" id="myFile" name="filename">
                            </div>



                            <hr>
                            <br>
                            <h4 class="card-title">Form For User</h4>


                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" checked=""> Input
                                    Name
                                    <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" checked=""> Input
                                    Email
                                    <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" checked=""> Input
                                    Phone
                                    (WhatsApp) <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" checked=""> Input
                                    Gender<i class="input-helper"></i></label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" checked=""> Upload
                                    Transaction Payment<i class="input-helper"></i></label>
                            </div>


                        </div>
                        <div class="mx-auto" style="float: right;">
                            <button type="submit" class="btn btn-sm btn-primary me-2">Submit</button>
                            <button class="btn btn-sm btn-light" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
