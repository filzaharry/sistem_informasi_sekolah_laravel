<div class="row">
    <div class="col-12">
        <div class=" my-4">
            <div class="p-4">

                <div class="table-responsive border rounded p-1">

                    <table class="table align-items-center justify-content-center mb-0" style="font-size: 13px;">
                        <thead>
                            <tr>
                                <th class="font-weight-bolder">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input type="checkbox" wire:click.prevent="allRowChecked"
                                        @if ($checkAllRow == true) checked @endif>
                                            <i class="input-helper"></i></label>
                                    </div>
                                </th>
                                <th class="font-weight-bolder">
                                    <div class="form-check">
                                        <label class="form-check-label"> Menu</label>
                                    </div>
                                </th>
                                <th class="font-weight-bolder">
                                    <div class="form-check">
                                        <label class="form-check-label"> Read</label>
                                    </div>
                                </th>
                                <th class="font-weight-bolder">
                                    <div class="form-check">
                                        <label class="form-check-label"> Create</label>
                                    </div>
                                </th>
                                <th class="font-weight-bolder">
                                    <div class="form-check">
                                        <label class="form-check-label"> Update</label>
                                    </div>
                                </th>
                                <th class="font-weight-bolder">
                                    <div class="form-check">
                                        <label class="form-check-label"> Delete</label>
                                    </div>
                                </th>
                                <th class="font-weight-bolder">
                                    <div class="form-check">
                                        <label class="form-check-label"> Export</label>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mainMenu as $mm)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" disabled  >
                                            </label> <i class="input-helper"></i>
                                        </div>
                                    </td>
                                    <td class="font-weight-bolder">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                {{ $mm->nama_menu }}
                                            </label>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @foreach ($data as $a)
                                    @if ($mm->id == $a->master)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="checkbox"
                                                        
                                                        wire:click.prevent="allChecked({{ $a }})"
                                                        @if (
                                                        $a->akses == '1' && 
                                                        $a->tambah == '1' && 
                                                        $a->edit == '1' && 
                                                        $a->hapus == '1' 
                                                        && $a->export == '1'
                                                        ) checked @endif>
                                                        <i class="input-helper"></i>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label"> 
                                                            {{ $a->nama }}
                                                        </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-5">
                                                    <i class="input-helper"></i>
                                                    <div class="form-check">
                                                        <label class="form-check-label"> 
                                                            <input  type="checkbox"
                                                                @if ($a->akses == 1) checked @endif
                                                                wire:click.prevent="readChecked({{ $a }})">
                                                                <i class="input-helper"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-5">
                                                    <div class="form-check">
                                                        <label class="form-check-label"> 
                                                
                                                            <input  type="checkbox"
                                                                @if ($a->tambah == 1) checked @endif
                                                                wire:click.prevent="createChecked({{ $a }})">
                                                                <i class="input-helper"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-5">
                                                    <div class="form-check">
                                                        <label class="form-check-label"> 
                                                
                                                            <input  type="checkbox"
                                                                @if ($a->edit == 1) checked @endif
                                                                wire:click.prevent="editChecked({{ $a }})">
                                                                <i class="input-helper"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-5">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox"
                                                                @if ($a->hapus == 1) checked @endif
                                                                wire:click.prevent="deleteChecked({{ $a }})">
                                                                <i class="input-helper"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-5">
                                                    <div class="form-check">
                                                        <label class="form-check-label"> 
                                                            <input  type="checkbox"
                                                                @if ($a->export == 1) checked @endif
                                                                wire:click.prevent="exportChecked({{ $a }})">
                                                                <i class="input-helper"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

