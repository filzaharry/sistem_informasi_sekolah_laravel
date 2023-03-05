<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @foreach ($main_menu as $main)
            @if ($main->url != '')
                <li class="nav-item nav-category">
                    <span class="nav-link">{{ $main->nama_menu }}</span>
                </li>
                <li class="nav-item @if (Request::segment(1) == $main->url) bg-dark @endif">
                    <a class="nav-link active" href="{{ route($main->url) }}">
                        <span class="menu-title">{{ $main->nama_menu }}</span>
                        <i class="{{ $main->icon }} menu-icon"></i>
                    </a>
                </li>
            @endif
            @if ($main->url == '')
                <li class="nav-item nav-category">
                    <span class="nav-link">{{ $main->nama_menu }}</span>
                </li>
                @foreach ($sub_menu as $sub)
                    @if ($main->id == $sub->master_menu)
                        <div class="nav-item @if (Request::segment(1) == $sub->url) bg-dark @endif">
                            <a class="nav-link active" href="{{ route($sub->url) }}">
                                <span class="menu-title">{{ $sub->nama_menu }}</span>
                                <i @if (Request::segment(1) == $sub->url) style="color:lightgreen" @endif
                                    class="{{ $sub->icon }} menu-icon"></i>
                            </a>
                        </div>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>
</nav>
<!-- partial -->
