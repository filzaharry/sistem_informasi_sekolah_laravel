<br>
<a href="" class="btn @if ($isNilai) btn-inverse-success @else btn-inverse-secondary @endif" wire:click.prevent="tabNilai"><i class="icon-docs"></i> Nilai</a>
<a href="" class="btn @if ($isRapor) btn-inverse-success @else btn-inverse-secondary @endif" wire:click.prevent="tabRapor"><i class="icon-doc"></i> Rapor</a>



@if ($isNilai)
    @include('livewire.kesiswaan.siswa-detail.nilai')
@elseif($isRapor)
    @include('livewire.kesiswaan.siswa-detail.rapor')
@endif