<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            {{-- <li class="@yield('dashboard')">
                <a href="{{ route('dashboard.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li> --}}
            <li class="@yield('token')">
                <a href="{{ route('token.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Generate Token</span>
                </a>
            </li>
            <li class="@yield('article')">
                <a href="{{ route('article.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Article</span>
                </a>
            </li>
            <li class="@yield('machine')">
                <a href="{{ route('machine.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Machine</span>
                </a>
            </li>
            <li class="@yield('machine_brand')">
                <a href="{{ route('machine_brand.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Machine Brand</span>
                </a>
            </li>
            <li class="@yield('machine_type')">
                <a href="{{ route('machine_type.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Machine Type</span>
                </a>
            </li>
            <li class="@yield('unit')">
                <a href="{{ route('unit.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Unit</span>
                </a>
            </li>
            <li class="@yield('department')">
                <a href="{{ route('department.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Department</span>
                </a>
            </li>
            <li class="@yield('mobil')">
                <a href="{{ route('mobil.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Mobil</span>
                </a>
            </li>
            <li class="@yield('peminjaman')">
                <a href="{{ route('peminjaman.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Peminjaman</span>
                </a>
            </li>
            <li class="@yield('pengembalian')">
                <a href="{{ route('pengembalian.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Pengembalian</span>
                </a>
            </li>
        </ul>
    </div>
</div>
