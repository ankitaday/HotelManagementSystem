<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Sidebar Toggle Button -->
        <button class="btn btn-outline-light d-md-none" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>

        <a class="navbar-brand ms-3" href="{{ route('admin.dashboard') }}">RD Hotel Admin</a>

        <!-- Right Side of Navbar -->
        <ul class="navbar-nav ms-auto">
            <!-- User Profile -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user"></i> Admin-{{ auth('admin')->user()->name ?? 'Guest' }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                        @csrf

                        <x-responsive-nav-link :href="route('admin.logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                style="display: inline-block; padding: 10px 20px;  color: rgb(0, 0, 0); border: none; border-radius: 5px; text-align: center; text-decoration: none; cursor: pointer;">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </ul>
            </li>
        </ul>
    </div>
</nav>
