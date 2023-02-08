@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.4/css/lightgallery.css">
@endpush
<div class="row">
    <div class="col-12">
        <div class=" my-4">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row pb-4">
                            <div class="col-lg-6">

                                {{-- hanya boleh dibuka jika sudah hari H --}}
                                <a class="btn btn-outline-info btn-sm" type="button"
                                    wire:click.prevent="showModalAdd">Create OTS</a>
                                <a class="btn btn-outline-success btn-sm" type="button"
                                    wire:click.prevent="exportData">Export</a>
                                <a class="btn btn-outline-success btn-sm" type="button"
                                    wire:click.prevent="showModalFilter">Filter</a>

                                @include('livewire.entries.create')
                                @include('livewire.entries.filter')

                            </div>
                            <div class="col-lg-3 ml-auto">
                                <input style="height: 35px;" wire:model="search" type="search"
                                    class="form-control-sm form-control" placeholder="Search ...">
                            </div>
                        </div>

                        <div class="table-responsive border rounded p-1">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold">Name</th>
                                        <th class="font-weight-bold">Phone</th>
                                        <th class="font-weight-bold">Email</th>
                                        <th class="font-weight-bold">City</th>
                                        <th class="font-weight-bold">Status</th>
                                        <th class="font-weight-bold">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $en)
                                        <tr>
                                            <td>{{ $en->name }}</td>
                                            <td>{{ $en->phone }}</td>
                                            <td>{{ $en->email }}</td>
                                            <td>{{ $en->city }}</td>
                                            <td>{{ $en->status }}</td>
                                            <td>
                                                <a class="btn btn-outline-info btn-sm" type="button"
                                                    wire:click.prevent="showModalDetail">
                                                    <i class="icon-eye"></i>
                                                </a>
                                                @include('livewire.entries.detail')
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="mr-auto p-4">
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
    </div>
</div>

@push('js')
    <script>
        window.addEventListener('show-form-add', event => {
            $('#formAdd').modal('show');
        })
        window.addEventListener('hide-form-add', event => {
            $('#formAdd').modal('hide');
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
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/lightgallery.umd.js"></script>
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
    </script>
@endpush
