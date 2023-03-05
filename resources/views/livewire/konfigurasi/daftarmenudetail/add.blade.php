<!-- Modal -->
<div class="modal fade" id="formAdd" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <form wire:submit.prevent="addSubMenu">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="subMenuName">Sub Menu Name</label>
                            <input type="text" class="form-control form-control-sm" id="subMenuName" wire:model="subMenuName">
                            @error('subMenuName')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="subMenuSort">Sort Sub Menu</label>
                            <input type="number" class="form-control form-control-sm" id="subMenuSort" wire:model="subMenuSort">
                            @error('subMenuSort')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Choose Icon</label>
                            <select class="custom-select" wire:model="subMenuIcon">
                                <option value="" selected>Choose One</option>
                                @foreach ($iconList as $icon)
                                    <option value="{{ $icon->code_icon }}"><i class="{{ $icon->code_icon }}"></i>
                                        {{ $icon->code_icon }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-check">
                                <label for="subMenuStatus" class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="subMenuStatus"
                                    wire:model="subMenuStatus">
                                    Active Status <i class="input-helper"></i></label>
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
