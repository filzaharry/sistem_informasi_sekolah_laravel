<hr>
<br>
<br>
<h4>Ticket List</h4>
<br>
<div class="row pb-4">
    <div class="col-lg-6">
        <a class="btn btn-outline-info btn-sm" type="button" wire:click.prevent="showModalAdd">Add New Ticket</a>
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
                <th class="font-weight-bold">Nama</th>
                <th class="font-weight-bold">Harga</th>
                <th class="font-weight-bold">Kuota</th>
                <th class="font-weight-bold">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ticketList as $sp)
                <tr>
                    <td>
                        <img src="https://mir-s3-cdn-cf.behance.net/projects/404/ff985099720727.Y3JvcCw1NzUzLDQ1MDAsMTIxMCww.png"
                            alt="">
                    </td>
                    <td>{{ $sp->name }}</td>
                    <td>{{ number_format($sp->price) }}</td>
                    <td>{{ number_format($sp->kuota) }}</td>
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
        <p class="text-bold">Showing <strong>{{ $ticketList->firstItem() }}</strong> to
            <strong>{{ $ticketList->lastItem() }}</strong> of
            <strong>{{ $ticketList->total() }}</strong>
        </p>
    </div>

    <div class="ml-auto pt-4">
        {{ $ticketList->withQueryString()->links() }}
    </div>
</div>
