<div class="row">
    <div class="col-12">
        <div class=" my-4">
            <div class="p-4">

                <div class="row pb-4">
                    <div class="col-lg-6">

                        @if ($isCreate == 1)
                            <button wire:click.prevent="showModalAdd" href="" class="btn btn-outline-success btn-sm">Add</button>
                        @endif
                        
                        <a wire:click.prevent="showModalFilter" class="btn btn-outline-success btn-sm" type="button">Filter</a>
                        
                    </div>
                    <div class="col-lg-3 ml-auto">
                        <input style="height: 35px;" wire:model="search" type="search"
                            class="form-control form-control-sm" placeholder="Search ...">
                    </div>
                </div>

                
                <div class="table-responsive border rounded p-1">
                    <table class="table align-items-center justify-content-center mb-0" style="font-size: 13px;">
                        <thead>
                            <tr>
                                <th class="font-weight-bolder">Icon</th>
                                <th class="font-weight-bolder">Name</th>
                                <th class="font-weight-bolder">Status</th>
                                <th class="font-weight-bolder ps-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $a)
                                <tr>
                                    <td>
                                        <span class="btn btn-sm ">
                                            <i class="{{ $a->code_icon }}"></i>
                                        </span>
                                    </td>
                                    <td>
                                        {{ $a->name }}
                                    </td>
                                    <td>
                                        <a
                                            class="btn btn-sm @if ($a->status == '1') text-success @else text-secondary @endif ">
                                            <i class="icon-check"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if ($isEdit == 1)
                                            <button wire:click.prevent="showModalEdit({{ $a }})"
                                                href="" class="btn btn-sm btn-outline-warning">
                                                <i class="icon-pencil"></i>
                                            </button>
                                            
                                        @endif

                                        @if ($isDelete == 1)
                                            <button wire:click.prevent="showModalDelete({{ $a }})"
                                                href="" class="btn btn-sm btn-outline-danger">
                                                <i class="icon-trash"></i>
                                            </button>
                                        @endif

                                    </td>
                                </tr>
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
@include('livewire.konfigurasi.icons.add')
@include('livewire.konfigurasi.icons.edit')
@include('livewire.konfigurasi.icons.delete')

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
