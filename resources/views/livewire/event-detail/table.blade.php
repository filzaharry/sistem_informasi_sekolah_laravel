@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.4/css/lightgallery.css">
@endpush
<div class="row">
    <div class="col-12">
        <div class=" my-4">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div style="margin-top:-20px;" class="card-body">
                        <h4 class="card-title" style="font-size: 30px;">{{ Str::upper($detailEvent->name) }}</h4>
                        <p style="margin-top:-10px;" class="card-description">
                            {{ date('d-M-Y', strtotime($detailEvent->start)) }}
                            -
                            {{ date('d-M-Y', strtotime($detailEvent->end)) }}</p>
                        <div class="row m-1 mb-4">
                            <a style="margin-top:-10px;" class="btn btn-dark btn-sm" type="button">Offline</a>
                            {{-- <a class="btn btn-success btn-sm" type="button">Online</a> --}}
                            <a style="margin-top:-10px;" class="btn btn-success btn-sm ml-2" type="button">Preview Web
                                App</a>
                        </div>
                        <div class="m-1">
                            <p class="card-description">{{ $detailEvent->desc }}</p>

                            <p class="card-description">Alamat : {{ $detailEvent->address }}</p>
                        </div>


                        @include('livewire.event-detail.ticket')
                        @include('livewire.event-detail.bank')
                        @include('livewire.event-detail.sponsor')



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        window.addEventListener('show-form-ticket', event => {
            $('#formTicket').modal('show');
        })
        window.addEventListener('hide-form-add', event => {
            $('#formTicket').modal('hide');
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
@endpush
