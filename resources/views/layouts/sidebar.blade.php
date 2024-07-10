<style>
    .nav-sidebar .nav-link.active {
        background-color: #f9cb34 !important;
        /* Warna latar belakang saat menu aktif (hijau) */
    }

    .nav-sidebar .nav-treeview .nav-link.active {
        background-color: #f9cb34 !important;
        /* Warna latar belakang submenu saat menu aktif (biru) */
    }

    .nav-sidebar .nav-link,
    .nav-sidebar .nav-link p {
        color: #fff !important;
    }
</style>
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    @foreach (json_decode(MenuHelper::Menu()) as $menu)
    <li class="nav-header">{{ strtoupper($menu->nama_menu) }}</li>
    @foreach ($menu->submenus as $submenu)
    @php
    $isActive = Request::segment(1) == $submenu->url;
    $hasActiveSubmenus = collect($submenu->submenus)->contains('url', Request::segment(1));
    @endphp
    @if (count($submenu->submenus) == 0)
    <li class="nav-item">
        <a href="{{ url($submenu->url) }}" class="nav-link {{ $isActive ? 'active' : '' }}">
            <i class="nav-icon {{ $submenu->icon }}"></i>
            <p>{{ ucwords($submenu->nama_menu) }}</p>
        </a>
    </li>
    @else
    <li class="nav-item {{ $isActive || $hasActiveSubmenus ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ $isActive || $hasActiveSubmenus ? 'active' : '' }}">
            <i class="nav-icon {{ $submenu->icon }}"></i>
            <p>
                {{ ucwords($submenu->nama_menu) }}
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @foreach ($submenu->submenus as $endmenu)
            <li class="nav-item">
                <a href="{{ url($endmenu->url) }}" class="nav-link {{ Request::segment(1) == $endmenu->url ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ ucwords($endmenu->nama_menu) }}</p>
                </a>
            </li>
            @endforeach
        </ul>
    </li>
    @endif
    @endforeach
    @endforeach
</ul>