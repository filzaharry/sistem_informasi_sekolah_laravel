<div class="row">
    <div class="col-12">
        <div class=" my-4">
            <div class="p-4">

                @if ($isCreate == 1)
                    <button wire:click.prevent="showModalAdd" href="" class="btn btn-primary">Add</button>
                    @include('livewire.konfigurasi.daftarmenu.add')
                @endif

                <div class="col-sm-12 col-md-6" style="float: right;">
                    <div id="example1_filter" class="dataTables_filter">
                        <input wire:model="search" type="search" class="form-control form-control"
                            placeholder="Search ...">
                    </div>
                </div>

                <div class="card-body px-0 pb-2">
                    <div class="table table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0" style="font-size: 13px;">
                            <thead>
                                <tr>
                                    <th class="font-weight-bolder">Icon</th>
                                    <th class="font-weight-bolder">Name</th>
                                    <th class="font-weight-bolder">URL</th>
                                    <th class="font-weight-bolder">Sort</th>
                                    <th class="font-weight-bolder">Is Parent</th>
                                    <th class="font-weight-bolder">Status</th>
                                    <th class="font-weight-bolder ps-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $a)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3">
                                                <button class="btn btn-sm bg-gradient-secondary">
                                                    <i class="{{ $a->icon }}"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3">{{ $a->nama_menu }}</div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3"><i>{{ $a->url }}</i></div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3">{{ $a->sort }}</div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3">
                                                <button
                                                    class="btn btn-sm @if ($a->is_parent == '1') text-success @else text-secondary @endif ">
                                                    <i class="icon-check"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3">
                                                <button
                                                    class="btn btn-sm @if ($a->aktif == 'Y') text-success @else text-secondary @endif ">
                                                    <i class="icon-check"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($a->is_parent == '1')
                                                <a href={{ route('daftar-menu-detail', [$a->id]) }}>
                                                    <button class="btn btn-sm bg-primary">
                                                        <i class="icon-info"></i>
                                                    </button>
                                                </a>
                                            @else
                                                <button class="btn btn-sm bg-secondary">
                                                    <i class="icon-info"></i>
                                                </button>
                                            @endif

                                            @if ($isEdit == 1)
                                                <button wire:click.prevent="showModalEdit({{ $a }})"
                                                    href="" class="btn btn-sm btn-warning"><i
                                                        class="icon-pencil"></i></button>
                                            @endif

                                            @if ($isDelete == 1)
                                                <button wire:click.prevent="showModalDelete({{ $a }})"
                                                    href="" class="btn btn-sm btn-danger"><i
                                                        class="icon-trash"></i></button>
                                            @endif

                                        </td>
                                    </tr>
                                    @include('livewire.konfigurasi.daftarmenu.edit')
                                    @include('livewire.konfigurasi.daftarmenu.delete')
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
