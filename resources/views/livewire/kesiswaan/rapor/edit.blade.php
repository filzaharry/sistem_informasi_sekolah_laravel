<!-- Modal -->
<div class="modal fade" id="formEdit" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <form wire:submit.prevent="editMasterMenu">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="masterMenuName">Master Menu Name</label>
                            <input type="text" class="form-control form-control-sm" id="masterMenuName" wire:model="masterMenuName">
                            @error('masterMenuName')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="masterMenuSort">Sort Menu</label>
                            <input type="number" class="form-control form-control-sm" id="masterMenuSort" wire:model="masterMenuSort">
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
                        <div class="form-check">
                            <label for="isParent" class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="isParent"
                                wire:model="isParent">
                                Have Sub Menu <i class="input-helper"></i>
                            </label>
                        </div>
                        <div class="form-check">
                            <label for="masterMenuStatus" class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="masterMenuStatus"
                                wire:model="masterMenuStatus">
                                Active Status <i class="input-helper"></i>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-outline-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
