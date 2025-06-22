<div class="sidebar">
    <div class="sidebar-header">
        <h3>Hotel Admin</h3>
    </div>
    <ul class="sidebar-menu">
        <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        <li class="{{ request()->is('rooms*') ? 'active' : '' }}">
            <a href="{{ route('rooms.index') }}">
                <i class="fas fa-bed"></i> Room Management
            </a>
        </li>
        <li class="{{ request()->is('reservations*') ? 'active' : '' }}">
            <a href="{{ route('reservations.index') }}">
                <i class="fas fa-calendar-check"></i> Reservations
            </a>
        </li>
        <li class="{{ request()->is('guests*') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}">
                <i class="fas fa-user"></i> User Management
            </a>
        </li>
        <li class="{{ request()->is('guests*') ? 'active' : '' }}">
            <a href="{{ route('adminPending') }}">
                <i class="fas fa-comment-dots"></i> Quaries
            </a>
        </li>

        {{-- <li>
            <a href="#">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </li> --}}
    </ul>
</div>
