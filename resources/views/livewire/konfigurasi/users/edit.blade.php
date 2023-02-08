<!-- Modal -->
<div class="modal fade" id="formEdit" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form wire:submit.prevent="editUser">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" wire:model="email">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" wire:model="username">
                        @error('username')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fullname">Name</label>
                        <input type="text" class="form-control" id="fullname" wire:model="fullname">
                        @error('fullname')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <label>Level User</label>
                    <div class="form-group">
                        <select class="custom-select" wire:model="level">
                            <option value="" selected>Choose One</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" wire:model="password">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    @if ($password)
                        <div class="form-group">
                            <label for="repeatpassword">Repeat Password</label>
                            <input type="password" class="form-control" id="repeatpassword" wire:model="repeatpassword">
                            @error('repeatpassword')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    @else
                        <span></span>
                    @endif

            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>

    </div>

</div>
