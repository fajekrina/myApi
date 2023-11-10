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
        </ul>
    </div>
</div>
