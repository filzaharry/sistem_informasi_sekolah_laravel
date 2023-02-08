<!-- Modal -->
<div class="modal fade" id="formDetail" tabindex="-1" role="dialog" wire:ignore.self>>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">
                    <h4 class="card-title">Detail {{ $en->name }}</h4>
                    <div class="modal-body bg-light" style="overflow-y:auto; max-height:400px;">
                        <table class=" bg-light table table-bordered align-items-center justify-content-center mb-0"
                            style="font-size: 13px;">
                            <tbody>
                                <tr>
                                    <th class="font-weight-bolder">Name</th>
                                    <td>
                                        <div class="d-flex px-3">{{ $en->name }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bolder">Email</th>
                                    <td>
                                        <div class="d-flex px-3">{{ $en->email }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bolder">Phone</th>
                                    <td>
                                        <div class="d-flex px-3">{{ $en->phone }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bolder">City</th>
                                    <td>
                                        <div class="d-flex px-3">{{ $en->city }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bolder">Gender</th>
                                    <td>
                                        <div class="d-flex px-3">{{ $en->gender }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bolder">Ticket</th>
                                    <td>
                                        <div class="d-flex px-3">VIP - RP 70.000,-</div>
                                        {{-- <div class="d-flex px-3">{{ $en->ticket_id }}</div> --}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bolder">Bank</th>
                                    <td>
                                        <div class="d-flex px-3">BANK BNI - 123123123123123123</div>
                                        {{-- <div class="d-flex px-3">{{ $en->bank_id }}</div> --}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bolder">Status</th>
                                    <td>
                                        <div class="d-flex px-3">Lunas</div>
                                        {{-- <div class="d-flex px-3">{{ $en->status }}</div> --}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bolder">Approved</th>
                                    <td>
                                        <div class="d-flex px-3">Sudah Di Approved</div>
                                        {{-- <div class="d-flex px-3">{{ $en->is_approved }}</div> --}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bolder">Event</th>
                                    <td>
                                        <div class="d-flex px-3">MERAIH MIMPI</div>
                                        {{-- <div class="d-flex px-3">{{ $en->event_id }}</div> --}}
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <th class="font-weight-bolder">QR Code</th>
                                    <td>
                                        <div class="d-flex px-3">{{ $en->generate_qr }}</div>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>

                    <div class="pt-4 gallery-container d-flex align-items-center justify-content-center"
                        id="gallery-container">

                        <a data-lg-size="1400-1400" class="gallery-item"
                            data-src="https://images.unsplash.com/photo-1588093413519-17cec3f64e40?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1400&q=80"
                            data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@entrycube' >Diego Guzmán </a></h4> <p> Location - <a href='https://unsplash.com/s/photos/fushimi-inari-taisha-shrine-senbontorii%2C-68%E7%95%AA%E5%9C%B0-fukakusa-yabunouchicho%2C-fushimi-ward%2C-kyoto%2C-japan'>Fushimi Ward, Kyoto, Japan</a></p>">
                            <img style="height:100px;border-radius:10px;margin:10px;width:100px;"
                                src="https://images.unsplash.com/photo-1588093413519-17cec3f64e40?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=240&q=80" />
                        </a>
                        <a data-lg-size="1443-1329" class="gallery-item"
                            data-src="https://images.unsplash.com/photo-1563502310703-1ffe473ad66d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1443&q=80"
                            data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@asoshiation' >Shah </a></h4><p> Location - <a href='https://unsplash.com/s/photos/shinimamiya%2C-osaka%2C-japan'>Shinimamiya, Osaka, Japan</a></p>">
                            <img style="height:100px;border-radius:10px;margin:10px;width:100px;"
                                src="https://id.qr-code-generator.com/wp-content/themes/qr/new_structure/markets/basic_market/generator/dist/generator/assets/images/websiteQRCode_noFrame.png" />
                        </a>
                    </div>

                    <button type="button" style="float: right;" class="ml-2 mt-4 btn btn-outline-info btn-sm"
                        data-bs-dismiss="modal">Approve</button>
                    <button type="button" style="float: right;" class="mt-4 btn btn-outline-secondary btn-sm"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
