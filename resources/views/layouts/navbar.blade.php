<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <style>
  /* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}
/* General Styling */
.dashboard-container {
    max-width: 1000px;
    margin: 30px auto;
    padding: 20px;
    background: #fff;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

/* Hero Section */
.hero-section {
    text-align: center;
    /* background: linear-gradient(to right, #007bffc3, #00c8ffb7); */
    background: url({{ asset('images/cover.jpg') }});
    background-size: cover;
    background-position: center;
    border-radius: 10px;
    color: white;
}
.hero{
    height:100%;
    width:100%;
    padding: 30px;

    /* background-image: url('images/cover.jpg');
     */
     background: rgba(0, 0, 0, 0.354);
     padding: -20px;
     /* margin: -10px; */
}
.hero-section h1 {
    margin-bottom: 10px;
}
.btn-group {
    margin-top: 15px;
}
.btn {
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    display: inline-block;
}
.primary-btn {
    background: #ff6b6b;
}
.secondary-btn {
    background: #28a745;
}
.btn:hover {
    opacity: 0.8;
}

/* Reservation Cards */
.reservation-cards {

    /* background: linear-gradient(to right, #007bff0f, #00c8ff2d); */
    background: url({{ asset('images/single-room.jpg') }});
    background-size: cover;
}
.reservationCheck{
    background: #32323200;
    /* padding-left:-30px; */
    padding: 10px;
    border-radius: 8px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    flex: 1 1 300px;
    height: 100%;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    /* margin: 30px; */
}
.reservation-card {
    background: #000000c0;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.037);
    flex: 1 1 300px;
    color: white
}
.reservation-card h3 {
    margin: 10px;
    color: white;
    font-weight: bold;
}
.status {
    display: inline-block;
    padding: 10px 10px;
    border-radius: 5px;
    font-weight: bold;
    margin-top:20px;
}
.status.pending {
    background: #ffc107;
    color: #fff;
}
.status.confirmed {
    background: #28a745;
    color: #fff;
}
.status.cancelled {
    background: #dc3545;
    color: #fff;
}
.cancel-btn {
    background: #dc3545;
    color: white;
    border: none;
    margin-top: 40px;
    width: 100%;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
}
.cancel-btn:hover {
    opacity: 0.8;
}
.section-title{
    margin-top: 40px;
    font-size: 50px;
    color: #0088ff;
}
/* Room Types */
.room-types {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    margin-top: 20px;
}
.room-card {
    flex: 1 1 300px;
    background: #fff;
    padding: 15px;
    text-align: center;
    border-radius: 8px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}
.room-card img {
    width: 100%;
    border-radius: 5px;
}
.room-card h3 {
    margin: 10px 0;
    color: #333;
}

/* Navbar Styles */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #2C3E50;
    padding: 15px 20px;
    color: white;
}

/* Logo */
.logo a {
    font-size: 22px;
    text-decoration: none;
    font-weight: bold;
    color: white;
}

/* Navigation Links */
.nav-links {
    display: flex;
    gap: 20px;
}

.nav-links a {
    color: white;
    text-decoration: none;
    font-size: 16px;
    transition: 0.3s;
}

.nav-links a:hover {
    color: #f39c12;
}

/* Auth Links */
.auth-links {
    display: flex;
    align-items: center;
    gap: 10px;
}

/* Profile Dropdown */
.profile-menu {
    position: relative;
}

.profile-btn {
    background: none;
    border: none;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

.dropdown {
    display: none;
    position: absolute;
    right: 0;
    top: 30px;
    background: white;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    min-width: 120px;
}

.dropdown a, .logout-btn {
    display: block;
    padding: 10px;
    color: #2C3E50;
    text-decoration: none;
    text-align: center;
    background: white;
    border: none;
    width: 100%;
    cursor: pointer;
}

.dropdown a:hover, .logout-btn:hover {
    background: #f39c12;
    color: white;
}

/* Show Dropdown on Hover */
.profile-menu:hover .dropdown {
    display: block;
}

/* Buttons */
.btn {
    padding: 8px 15px;
    /* background: #f74444; */
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: 0.3s;
}

.btn:hover {
    /* background: #db1919; */
}

.btn-register {
    background: #27ae60;
}

.btn-register:hover {
    background: #2ecc71;
}

/* Responsive */
@media (max-width: 768px) {
    .navbar {
        flex-direction: column;
        text-align: center;
    }
    .nav-links {
        margin-top: 10px;
        flex-direction: column;
    }
    .auth-links {
        margin-top: 10px;
    }
}
/* Dashboard Container */
.dashboard-container {
    width: 90%;
    max-width: 1000px;
    margin: auto;
    padding: 20px;
    text-align: center;
}

/* Title */
.dashboard-title {
    font-size: 26px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #2C3E50;
}

/* Card Style */
.reservations-card {
    background: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}
.card-title {
    font-size: 25px;
    /* font-weight: bold; */
    margin-bottom: 20px;
    color: #0381ff;
}
img{
    width:140px;
    height: 200px;
}
/* Table */
.styled-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    border-radius: 10px;
    overflow: hidden;
}

.styled-table th, .styled-table td {
    padding: 12px;
    text-align: center;
}

.styled-table thead {
    background: #3498db;
    color: white;
    font-weight: bold;
}

.styled-table tbody tr:nth-child(even) {
    background: #f8f9fa;
}

.styled-table tbody tr:hover {
    background: #ecf0f1;
}

/* Status Badges */
.status-badge {
    padding: 6px 12px;
    border-radius: 5px;
    font-size: 14px;
    color: white;
}

.status-badge.pending {
    background: #f39c12;
}

.status-badge.confirmed {
    background: #27ae60;
}

.status-badge.cancelled {
    background: #c0392b;
}

/* No Action */
.no-action {
    color: #7f8c8d;
    font-size: 14px;
}

/* Cancel Button */
.btn-danger {
    background: #e74c3c;
    color: white;
    border: none;
    padding: 6px 12px;
    cursor: pointer;
    border-radius: 5px;
    transition: 0.3s;
}

.btn-danger:hover {
    background: #c0392b;
}

/* No Reservations */
.no-reservations {
    font-size: 16px;
    color: #7f8c8d;
}

.book-now {
    color: #3498db;
    font-weight: bold;
    text-decoration: none;
}

.book-now:hover {
    text-decoration: underline;
}

/* Bookings Container */
.bookings-container {
    width: 90%;
    max-width: 1000px;
    margin: auto;
    padding: 20px;
    text-align: center;
}

/* Title */
.bookings-title {
    font-size: 26px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #2C3E50;
}

/* Card Style */
.bookings-card {
    background: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

/* Table */
.styled-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    border-radius: 10px;
    overflow: hidden;
}

.styled-table th, .styled-table td {
    padding: 12px;
    text-align: center;
}

.styled-table thead {
    background: #3498db;
    color: white;
    font-weight: bold;
}

.styled-table tbody tr:nth-child(even) {
    background: #f8f9fa;
}

.styled-table tbody tr:hover {
    background: #ecf0f1;
}

/* Status Badges */
.status-badge {
    padding: 6px 12px;
    border-radius: 5px;
    font-size: 14px;
    color: white;
}

.status-badge.pending {
    background: #f39c12;
}

.status-badge.confirmed {
    background: #27ae60;
}

.status-badge.cancelled {
    background: #c0392b;
}

/* Pagination */
.pagination-links {
    margin-top: 20px;
}

.pagination-links a {
    text-decoration: none;
    background: #3498db;
    color: white;
    padding: 8px 12px;
    margin: 0 5px;
    border-radius: 5px;
}

.pagination-links a:hover {
    background: #2980b9;
}

    </style>
     @yield('styles')
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking Navbar</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header class="navbar">
        <div class="logo">
            <a href="#">RD Hotel</a>
        </div>

        <nav class="nav-links">
            <a href="/dashboard">Dashboard</a>
            <a href="/bookings">My Bookings</a>
            <a href="{{ route('userroom.index') }}">Rooms</a>
            <a href="/pending">Help&Contact</a>


        </nav>


            <!-- If user is NOT logged in -->
            {{-- <form action="{{ route('user.logout') }}" method="POST" style="display: inline;">
                @csrf
                {{-- @method('POST') --}}
                {{-- <button type="submit" class="btn btn-danger">Logout</button> --}}
            {{-- </form> --}}

            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        style="display: inline-block; padding: 10px 20px; background-color: #ff0000; color: white; border: none; border-radius: 5px; text-align: center; text-decoration: none; cursor: pointer;">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>

        </div>
    </header>

    {{-- @yield('content') --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
