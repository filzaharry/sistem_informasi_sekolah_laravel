<!-- Modal -->
<div class="modal fade" id="formAdd" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <form wire:submit.prevent="addMasterMenu">
                <div class="modal-body">
                    <div class="container">
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
                                <option value="" selected>Choose One</option>
                                @foreach ($iconList as $icon)
                                    <option value="{{ $icon->code_icon }}"><i class="{{ $icon->code_icon }}"></i>
                                        {{ $icon->code_icon }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-check">
                            <label for="isParent" class="form-check-label">
                                <input class="custom-control-input" type="checkbox" id="isParent"
                                    wire:model="isParent"><i class="input-helper"></i>
                                Have Sub Menu
                            </label>
                        </div>
                        <div class="form-check">
                            <label for="masterMenuStatus" class="form-check-label">
                                <input class="custom-control-input" type="checkbox" id="masterMenuStatus"
                                    wire:model="masterMenuStatus"><i class="input-helper"></i>
                                Active Status
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
