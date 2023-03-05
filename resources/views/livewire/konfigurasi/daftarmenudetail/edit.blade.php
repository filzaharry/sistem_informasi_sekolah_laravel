<!-- Modal -->
<div class="modal fade" id="formEdit" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <form wire:submit.prevent="editSubMenu">
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
                            <label for="subMenuSort">Sort Menu</label>
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
                                <option value="" selected disabled>Choose One</option>
                                @foreach ($iconList as $icon)
                                    <option value="{{ $icon->name }}"><i class="{{ $icon->name }}"></i>
                                        {{ $icon->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="subMenuStatus"
                                    wire:model="subMenuStatus">
                                <label for="subMenuStatus" class="custom-control-label">Active Status</label>
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
