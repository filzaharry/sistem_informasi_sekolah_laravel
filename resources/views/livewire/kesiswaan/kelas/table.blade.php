<div class="row">
    <div class="col-12">
        <div class=" my-4">
            <div class="p-4">

                <div class="row pb-4">
                    <div class="col-lg-6">

                        @if ($isCreate == 1)
                            <a wire:click.prevent="showModalAdd" class="btn btn-outline-success btn-sm" type="button">Add</a>
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
                                <th class="font-weight-bolder">Kategori</th>
                                <th class="font-weight-bolder">Kelas</th>
                                <th class="font-weight-bolder">Jam Masuk</th>
                                <th class="font-weight-bolder">Jam Pulang</th>
                                <th class="font-weight-bolder ps-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $a)
                                <tr>
                                    <td>{{ $a->kategori }}</td>
                                    <td>{{ $a->kelas }}</td>
                                    <td>{{ $a->clockin }}</td>
                                    <td>{{ $a->clockout }}</td>
                                    <td>

                                        @if ($isEdit == 1)
                                            <a wire:click.prevent="showModalEdit({{ $a }})"
                                                href="" class="btn btn-sm btn-outline-warning"><i
                                                    class="icon-pencil"></i></a>
                                        @endif

                                        @if ($isDelete == 1)
                                            <a wire:click.prevent="showModalDelete({{ $a }})"
                                                href="" class="btn btn-sm btn-outline-danger"><i
                                                    class="icon-trash"></i></a>
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
@include('livewire.kesiswaan.kelas.add')
@include('livewire.kesiswaan.kelas.edit')
@include('livewire.kesiswaan.kelas.delete')

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
