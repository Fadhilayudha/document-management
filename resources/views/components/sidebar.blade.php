<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <!-- Brand Logo -->
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Management Document </a>
        </div>
        <!-- Small Brand Logo -->
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">MD</a>
        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- Dashboard -->
            <li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            @if (auth()->check() && auth()->user()->user_type === 'admin')
                <!-- User Management (for Administrator) -->
                <li class="{{ Request::is('user*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user') }}">
                        <i class="fas fa-user"></i> <span>Akun User</span>
                    </a>
                </li>
            @endif
            <!-- Dokumen -->
            <li class="{{ Request::is('document*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('document') }}">
                    <i class="fas fa-file"></i> <span>Dokumen</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
