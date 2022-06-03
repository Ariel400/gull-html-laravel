<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item {{ request()->is('dashboard/*') ? 'active' : '' }}" data-item="">
                <a class="nav-item-hold" href="{{route('dashboard_version_2')}}">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ request()->is('datatables/*') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{route('basic-tables')}}">
                    <i class="nav-icon i-File-Horizontal-Text"></i>
                    <span class="nav-text">Mes demandes</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ Route::currentRouteName()=='chat' ? 'open' : '' }}">
                <a class="nav-item-hold" href="{{route('chat')}}">
                    <i class="nav-icon i-File-Horizontal-Text"></i>
                    <span class="nav-text">Service Client</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ Route::currentRouteName()=='user-profile' ? 'open' : '' }}">
                <a class="nav-item-hold" href="{{route('user-profile')}}">
                    <i class="nav-icon i-File-Horizontal-Text"></i>
                    <span class="nav-text">Profile</span>
                </a>
                <div class="triangle"></div>
            </li>



        </ul>
    </div>

    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->
