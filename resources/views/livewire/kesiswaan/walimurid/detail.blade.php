<!-- Modal -->
<div class="modal fade" id="formDetail" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <p class="display-5">{{$titleDetail}}</p>
                    <hr>
                    <div class="m-1 mb-4">
                        <p class="mb-0  mt-2">Nama : <strong>{{$nama}}</strong></p>
                        <p class="mb-0  mt-2">No. KTP : <strong>{{$no_ktp}}</strong></p>
                        <p class="mb-0  mt-2">No. Telp : <strong>{{$no_telp}}</strong></p>
                        <p class="mb-0  mt-2">Gender : <strong>{{$gender}}</strong></p>
                        <p class="mb-0  mt-2">Alamat : <strong>{{$alamat}}</strong></p>
                    </div>
                    <div class="table-responsive border rounded p-1 bg-light">
                        <table class="table align-items-center justify-content-center mb-0" style="font-size: 13px;">
                            <thead>
                                <tr>
                                    <th class="font-weight-bolder">Kelas</th>
                                    <th class="font-weight-bolder">Semester</th>
                                    <th class="font-weight-bolder">Wali Kelas</th>
                                    <th class="font-weight-bolder">Mata Pelajaran</th>
                                    <th class="font-weight-bolder">Jenis</th>
                                    <th class="font-weight-bolder">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataSiswa as $ss)
                                    <tr>
                                        <td>SMP Kelas 7</td>
                                        <td>Ganjil</td>
                                        <td>Daisuki S.Pd.</td>
                                        <td>Pendidikan Kewarganegaraan</td>
                                        <td>Harian</td>
                                        <td>80</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
