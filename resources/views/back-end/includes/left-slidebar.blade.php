<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('dashboard')" href="{{route('dashboard')}}">
                            <i class="fa fa-fw fa-user-circle"></i>{{__('dashboard')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('menu')" href="{{route('menu')}}">
                            <i class="fa fa-fw fa-user-circle"></i>Menu List
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('user-list')" href="{{route('user-list')}}">
                            <i class="fa fa-fw fa-user-circle"></i>User List
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>