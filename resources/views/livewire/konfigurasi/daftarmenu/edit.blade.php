<!-- Modal -->
<div class="modal fade" id="formEdit" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <form wire:submit.prevent="editMasterMenu">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="masterMenuName">Master Menu Name</label>
                            <input type="text" class="form-control" id="masterMenuName" wire:model="masterMenuName">
                            @error('masterMenuName')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="masterMenuSort">Sort Menu</label>
                            <input type="number" class="form-control" id="masterMenuSort" wire:model="masterMenuSort">
                            @error('masterMenuSort')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Choose Icon</label>
                            <select class="custom-select" wire:model="masterMenuIcon">
                                <option value="" selected disabled>Choose One</option>
                                @foreach ($iconList as $icon)
                                    <option value="{{ $icon->name }}"><i class="{{ $icon->name }}"></i>
                                        {{ $icon->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="isParent"
                                    wire:model="isParent">
                                <label for="isParent" class="custom-control-label">Have Sub Menu</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="masterMenuStatus"
                                    wire:model="masterMenuStatus">
                                <label for="masterMenuStatus" class="custom-control-label">Active Status</label>
                            </div>
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
