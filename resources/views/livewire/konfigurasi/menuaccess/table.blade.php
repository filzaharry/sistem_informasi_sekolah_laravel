<div class="row">
    <div class="col-12">
        <div class=" my-4">
            <div class="p-4">
                <div class="row justify-between">

                    {{-- <div class="col">
                        <select class="form-select form-control-sm" wire:model="getLevel">
                            <option selected>Choose Your User Level</option>
                            @foreach ($userLevel as $i)
                                <option value="{{ $i->id }}">{{ $i->nama_level_user }}</option>
                            @endforeach
                        </select>
                    </div> --}}


                    <div class="col">
                        <div class="dataTables_filter">
                            <input wire:model="search" type="search" class="form-control form-control-sm"
                                placeholder="Search ">
                        </div>
                    </div>
                </div>

                <div class="card-body px-0 pb-2">
                    <div class="table table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0" style="font-size: 13px;">
                            <thead>
                                <tr>
                                    <th class="font-weight-bolder">
                                        {{-- <input type="checkbox" disabled> --}}
                                        <input type="checkbox" wire:click.prevent="allRowChecked"
                                            @if ($checkAllRow == true) checked @endif>
                                    </th>
                                    <th class="font-weight-bolder">Menu</th>
                                    <th class="font-weight-bolder">Read</th>
                                    <th class="font-weight-bolder">Create</th>
                                    <th class="font-weight-bolder">Update</th>
                                    <th class="font-weight-bolder">Delete</th>
                                    <th class="font-weight-bolder">Export</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $a)
                                    @if ($a->url == '')
                                        <tr>
                                            <td>
                                                <input type="checkbox" disabled>
                                            </td>
                                            <td>
                                                <div class="d-flex px-3">{{ $a->name }}</div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>
                                                <input type="checkbox"
                                                    wire:click.prevent="allChecked({{ $a }})"
                                                    @if ($a->read == '1' && $a->create == '1' && $a->edit == '1' && $a->delete == '1' && $a->export == '1') checked @endif>
                                            </td>
                                            <td>
                                                <div class="d-flex px-3">{{ $a->name }}</div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-3">
                                                    <input type="checkbox"
                                                        @if ($a->read) checked @endif
                                                        wire:click.prevent="readChecked({{ $a }})">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-3">
                                                    <input type="checkbox"
                                                        @if ($a->create) checked @endif
                                                        wire:click.prevent="createChecked({{ $a }})">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-3">
                                                    <input type="checkbox"
                                                        @if ($a->edit) checked @endif
                                                        wire:click.prevent="editChecked({{ $a }})">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-3">
                                                    <input type="checkbox"
                                                        @if ($a->delete) checked @endif
                                                        wire:click.prevent="deleteChecked({{ $a }})">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-3">
                                                    <input type="checkbox"
                                                        @if ($a->export) checked @endif
                                                        wire:click.prevent="exportChecked({{ $a }})">
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>
                        </table>
                        {{ $data->withQueryString()->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    window.addEventListener('show-form-add', event => {
        $('#formAdd').modal('show');
    })
    window.addEventListener('hide-form-add', event => {
        $('#formAdd').modal('hide');
    })


    window.addEventListener('show-form-edit', event => {
        $('#formEdit').modal('show');
    })
    window.addEventListener('hide-form-edit', event => {
        $('#formEdit').modal('hide');
    })

    window.addEventListener('show-form-delete', event => {
        $('#formDelete').modal('show');
    })
    window.addEventListener('hide-form-delete', event => {
        $('#formDelete').modal('hide');
    })
</script>
