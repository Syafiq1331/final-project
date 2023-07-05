<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('laravel.svg') }}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">
            @if (Auth::check() && Auth::user()->role === 'admin')
                Admin Farmku
            @else
                User Farmku
            @endif
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        <i class="bi bi-house-door nav-icon"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-header">Manage Farm</li>
                @if (Auth::check() && Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a href="manage/user" class="nav-link">
                            <i class="nav-icon bi bi-people-fill"></i>
                            <p>
                                Manage User
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="manage/field" class="nav-link">
                            <i class="nav-icon bi bi-geo-alt-fill"></i>
                            <p>
                                Manage Field
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="/logout" class="nav-link">
                        <i class="nav-icon bi bi-box-arrow-left"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
