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


                    {{-- <div class="col">
                        <div class="dataTables_filter">
                            <input wire:model="search" type="search" class="form-control form-control-sm"
                                placeholder="Search ">
                        </div>
                    </div> --}}
                    <div class="col-lg-3 ml-auto mb-4">
                        <input style="height: 35px;" wire:model="search" type="search"
                            class="form-control form-control-sm" placeholder="Search ...">
                    </div>
                </div>

                <div class="table-responsive border rounded p-1">

                    <table class="table align-items-center justify-content-center mb-0" style="font-size: 13px;">
                        <thead>
                            <tr>
                                <th class="font-weight-bolder">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input type="checkbox" wire:click.prevent="allRowChecked"
                                        @if ($checkAllRow == true) checked @endif>
                                            <i class="input-helper"></i></label>
                                    </div>
                                </th>
                                <th class="font-weight-bolder">
                                    <div class="form-check">
                                        <label class="form-check-label"> Menu</label>
                                    </div>
                                </th>
                                <th class="font-weight-bolder">
                                    <div class="form-check">
                                        <label class="form-check-label"> Read</label>
                                    </div>
                                </th>
                                <th class="font-weight-bolder">
                                    <div class="form-check">
                                        <label class="form-check-label"> Create</label>
                                    </div>
                                </th>
                                <th class="font-weight-bolder">
                                    <div class="form-check">
                                        <label class="form-check-label"> Update</label>
                                    </div>
                                </th>
                                <th class="font-weight-bolder">
                                    <div class="form-check">
                                        <label class="form-check-label"> Delete</label>
                                    </div>
                                </th>
                                <th class="font-weight-bolder">
                                    <div class="form-check">
                                        <label class="form-check-label"> Export</label>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $a)
                                @if ($a->url == '')
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" disabled  style="position:relative;">
                                                </label> <i class="input-helper"></i>
                                            </div>
                                        </td>
                                        <td class="font-weight-bolder">
                                            {{-- <div class="d-flex px-3"> --}}
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        {{ $a->nama }}
                                                    </label>
                                                </div>
                                            {{-- </div> --}}
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
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="checkbox"
                                                    style="position:relative;"
                                                    wire:click.prevent="allChecked({{ $a }})"
                                                    @if (
                                                    $a->akses == '1' && 
                                                    $a->tambah == '1' && 
                                                    $a->edit == '1' && 
                                                    $a->hapus == '1' 
                                                    && $a->export == '1'
                                                    ) checked @endif>
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3">
                                                <div class="form-check">
                                                    <label class="form-check-label"> 
                                                        {{ $a->nama }}
                                                    </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-5">
                                                <div class="form-check">
                                                    <label class="form-check-label"> 
                                            
                                                        <input style="position:relative;" type="checkbox"
                                                            @if ($a->akses) checked @endif
                                                            wire:click.prevent="readChecked({{ $a }})">
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-5">
                                                <div class="form-check">
                                                    <label class="form-check-label"> 
                                            
                                                        <input style="position:relative;" type="checkbox"
                                                            @if ($a->tambah) checked @endif
                                                            wire:click.prevent="createChecked({{ $a }})">
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-5">
                                                <div class="form-check">
                                                    <label class="form-check-label"> 
                                            
                                                        <input style="position:relative;" type="checkbox"
                                                            @if ($a->edit) checked @endif
                                                            wire:click.prevent="editChecked({{ $a }})">
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-5">
                                                <div class="form-check">
                                                    <label class="form-check-label"> 
                                            
                                                        <input style="position:relative;" type="checkbox"
                                                            @if ($a->hapus) checked @endif
                                                            wire:click.prevent="deleteChecked({{ $a }})">
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-5">
                                                <div class="form-check">
                                                    <label class="form-check-label"> 
                                            
                                                        <input style="position:relative;" type="checkbox"
                                                            @if ($a->export) checked @endif
                                                            wire:click.prevent="exportChecked({{ $a }})">
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="row mx-1">
                    <div class="py-4" >
                        <p class="text-bold">Showing <strong>{{ $data->firstItem() }}</strong> to
                            <strong>{{ $data->lastItem() }}</strong> of
                            <strong>{{ $data->total() }}</strong>
                        </p>
                    </div>

                    <div class="ml-auto pt-4">
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
