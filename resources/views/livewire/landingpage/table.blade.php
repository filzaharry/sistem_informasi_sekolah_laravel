@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.4/css/lightgallery.css">
@endpush
<div class="row">
    <div class="col-12">
        <div class=" my-4">
            <div class="p-4">
                <div class="row pb-4">
                    <div class="col-lg-6">
                        <a class="btn btn-outline-success btn-sm" type="button"
                            wire:click.prevent="exportData">Export</a>
                        <a class="btn btn-outline-success btn-sm" type="button"
                            wire:click.prevent="showModalFilter">Filter</a>
                    </div>
                    <div class="col-lg-3 ml-auto">
                        <input style="height: 35px;" wire:model="search" type="search"
                            class="form-control form-control-sm" placeholder="Search ...">
                    </div>
                </div>

                <div class="table-responsive border rounded p-1">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="font-weight-bold">Param</th>
                                <th class="font-weight-bold">Value</th>
                                <th class="font-weight-bold">Status</th>
                                <th class="font-weight-bold">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $en)
                                <tr>
                                    <td>{{ $en->param }}</td>
                                    <td>{{ $en->value }}</td>
                                    <td>
                                        <a
                                            class="btn btn-sm @if ($en->status == '1') text-success @else text-secondary @endif ">
                                            <i class="icon-check"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if ($isEdit == 1)
                                            <a class="btn btn-outline-warning btn-sm" type="button"
                                                wire:click.prevent="showModalEdit({{ $en }})">
                                                <i class="icon-pencil"></i>
                                            </a>
                                            
                                        @endif
                                        @if ($isDelete == 1)
                                            <a class="btn btn-outline-danger btn-sm" type="button"
                                                wire:click.prevent="showModalDelete({{ $en }})">
                                                <i class="icon-trash"></i>
                                            </a>
                                            
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

@include('livewire.landingpage.edit')
@include('livewire.landingpage.filter')
@include('livewire.landingpage.delete')

@push('js')
    <script>
        // window.addEventListener('show-form-add', event => {
        //     $('#formAdd').modal('show');
        // })
        // window.addEventListener('hide-form-add', event => {
        //     $('#formAdd').modal('hide');
        // })
        
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

        window.addEventListener('show-form-filter', event => {
            $('#formFilter').modal('show');
        })
        window.addEventListener('hide-form-filter', event => {
            $('#formFilter').modal('hide');
        })

        window.addEventListener('show-form-detail', event => {
            $('#formDetail').modal('show');
        })
        window.addEventListener('hide-form-detail', event => {
            $('#formDetail').modal('hide');
        })
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/lightgallery.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/plugins/zoom/lg-zoom.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/plugins/fullscreen/lg-fullscreen.umd.js"></script>
    <script>
        const container = document.getElementById('gallery-container');
        lightGallery(container, {
            speed: 500,
            plugins: [lgZoom, lgFullscreen],
        });

        const requestFullScreen = () => {
            const el = document.documentElement;
            if (el.requestFullscreen) {
                el.requestFullscreen();
            } else if (el.msRequestFullscreen) {
                el.msRequestFullscreen();
            } else if (el.mozRequestFullScreen) {
                el.mozRequestFullScreen();
            } else if (el.webkitRequestFullscreen) {
                el.webkitRequestFullscreen();
            }
        };
        container.addEventListener('lgAfterOpen', () => {
            requestFullScreen();
        });
    </script> --}}
@endpush
