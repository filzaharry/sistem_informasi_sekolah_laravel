<div class="row pb-4 mt-4">
    <div class="col-lg-6">

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
                <th class="font-weight-bolder">Kelas</th>
                <th class="font-weight-bolder">Semester</th>
                <th class="font-weight-bolder">Wali Kelas</th>
                <th class="font-weight-bolder">Peringkat</th>
                <th class="font-weight-bolder">Nilai Praktek</th>
                <th class="font-weight-bolder">Nilai Teori</th>
                <th class="font-weight-bolder">Nilai UTS</th>
                <th class="font-weight-bolder">Nilai UAS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>SMP Kelas 7</td>
                <td>Ganjil</td>
                <td>Daisuki S.Pd.</td>
                <td>Pendidikan Kewarganegaraan</td>
                <td>Harian</td>
                <td>80</td>
            </tr>

        </tbody>
    </table>
</div>