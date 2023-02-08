<hr>
<br>
<br>
<h4>Sponsor List</h4>
<br>
<div class="row pb-4">
    <div class="col-lg-6">
        <a class="btn btn-outline-info btn-sm" type="button" wire:click.prevent="showModalAdd">Add New Sponsor</a>
    </div>
    <div class="col-lg-3 ml-auto">
        <input style="height: 35px;" wire:model="search" type="search" class="form-control-sm form-control"
            placeholder="Search ...">
    </div>
</div>

<div class="table-responsive border rounded p-1">
    <table class="table">
        <thead>
            <tr>
                <th class="font-weight-bold">#</th>
                <th class="font-weight-bold">Nama Sponsor</th>
                <th class="font-weight-bold">Nama Penyedia Sponsor</th>
                <th class="font-weight-bold">Kontak</th>
                <th class="font-weight-bold">Nominal</th>
                <th class="font-weight-bold">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sponsorList as $sp)
                <tr>
                    <td>
                        <img src="https://mir-s3-cdn-cf.behance.net/projects/404/ff985099720727.Y3JvcCw1NzUzLDQ1MDAsMTIxMCww.png"
                            alt="">
                    </td>
                    <td>{{ $sp->name }}</td>
                    <td>{{ $sp->contact }}</td>
                    <td>{{ $sp->contact_phone }}</td>
                    <td>{{ number_format($sp->nominal) }}</td>
                    <td>
                        <a class="btn btn-outline-danger btn-sm" type="button" wire:click.prevent="showModalDetail">
                            <i class="icon-trash"></i>
                        </a>
                        <a class="btn btn-outline-warning btn-sm" type="button" wire:click.prevent="showModalDetail">
                            <i class="icon-pencil"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row">
    <div class="mr-auto p-4">
        <p class="text-bold">Showing <strong>{{ $sponsorList->firstItem() }}</strong> to
            <strong>{{ $sponsorList->lastItem() }}</strong> of
            <strong>{{ $sponsorList->total() }}</strong>
        </p>
    </div>

    <div class="ml-auto pt-4">
        {{ $sponsorList->withQueryString()->links() }}
    </div>
</div>
