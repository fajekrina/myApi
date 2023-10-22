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
        </ul>
    </div>
</div>
