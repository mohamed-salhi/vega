<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item ">
                <a href="{{ route('index') }}" class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard

                    </p>
                </a>

            </li>
            <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link {{ request()->routeIs('category.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Category

                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('project.index')}}" class="nav-link {{ request()->routeIs('project.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th "></i>
                    <p>
                        Project

                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('contact')}}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th "></i>
                    <p>
                        Contact
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('comment')}}" class="nav-link {{ request()->routeIs('comment') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th "></i>
                    <p>
                        Comment
                    </p>
                </a>
            </li>

            <li class="nav-item">

                    <a class="nav-link" data-toggle="dropdown" onclick="event.preventDefault(); document.getElementById('logout').submit()" href="{{ route('logout') }}">
                        <i class="nav-icon fas fa-th "></i>
                        <p style="color: red">
                             LogOut
                        </p>

                        <form action="{{ route('logout') }}" id="logout" method="post" style="display: none" >
                            @csrf
                        </form>
                    </a>

            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
