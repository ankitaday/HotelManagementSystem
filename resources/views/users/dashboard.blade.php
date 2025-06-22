@extends('users.home')

@section('content')
<div class="dashboard-container" style="width: 100%">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero">
        <h1>Welcome, {{ Auth::user()->name }}!</h1>
        <p>Manage your bookings effortlessly.</p>
        <div class="btn-group">
            <a href="{{ route('bookings') }}" class="btn primary-btn">View Booking History</a>
            <a href="{{ route('userroom.index') }}" class="btn secondary-btn">Make a New Reservation</a>
        </div>
        </div>
    </div>

    <!-- Reservation Overview -->
    <h2 class="section-title">Your Recent Reservations</h2>
    @if ($reservations->count() > 0)
        <div class="reservation-cards">
            <div class="reservationCheck">
            @foreach ($reservations as $reservation)
                <div class="reservation-card">
                    <h3>Room {{ $reservation->room->room_number }} ({{ $reservation->room->room_type }})</h3>
                    <p><strong>Check-in:</strong> {{ $reservation->check_in }}</p>
                    <p><strong>Check-out:</strong> {{ $reservation->check_out }}</p>
                    <p class="status {{ $reservation->status }}">{{ ucfirst($reservation->status) }}</p>
                    @if ($reservation->status == 'pending')
                        <form method="POST" action="{{ route('userroom.update', $reservation->id) }}">
                            @csrf
                            @method('PUT')
                            <button class="cancel-btn">Cancel</button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <p class="no-reservations">No reservations found. <a href="{{ route('user.reservations') }}" class="book-now">Book a room now!</a></p>
    @endif
    </div>
    <x-rooms></x-rooms>

    </div>
</div>

@endsection

@section('styles')
<style>
    body {
        background-color: #f4f4f4;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .hero-section {
        background: #f8f9fa;
        padding: 40px;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .hero-section h1 {
        font-size: 2.5em;
        margin-bottom: 10px;
        color: #333;
    }

    .hero-section p {
        font-size: 1.2em;
        margin-bottom: 20px;
        color: #666;
    }

    .btn-group {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        color: white;
        transition: background-color 0.3s;
        font-size: 1em;
    }

    .primary-btn {
        background-color: #007bff;
    }

    .primary-btn:hover {
        background-color: #0056b3;
    }

    .secondary-btn {
        background-color: #6c757d;
    }

    .secondary-btn:hover {
        background-color: #5a6268;
    }

    .section-title {
        font-size: 2em;
        margin: 40px 0 20px;

        text-align: center;
        color: #333;
    }

    .reservation-cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        margin-bottom: 40px;
    }

    .reservation-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 300px;
        text-align: center;
        transition: transform 0.2s;
    }

    .reservation-card:hover {
        transform: scale(1.05);
    }

    .reservation-card h3 {
        font-size: 1.5em;
        margin-bottom: 10px;
        color: #007bff;
    }

    .reservation-card p {
        margin: 5px 0;
        color: #555;
    }

    .status {
        font-weight: bold;
        margin-top: 10px;
    }

    .status.pending {
        color: rgb(255, 255, 255);
    }

    .status.confirmed {
        color: rgb(255, 255, 255);
    }

    .status.cancelled {
        color: rgb(255, 252, 252);
    }

    .cancel-btn {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .cancel-btn:hover {
        background-color: #c82333;
    }

    .no-reservations {
        text-align: center;
        font-size: 1.2em;
        color: #666;
    }

    .book-now {
        color: #007bff;
        text-decoration: underline;
    }

    .book-now:hover {
        text-decoration: none;
    }

    .room-types {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .room-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
        padding: 20px;
        transition: transform 0.2s;
    }

    .room-card img {
        width: 100%;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .room-card h3 {
        font-size: 1.5em;
        margin-bottom: 10px;
        color: #007bff;
    }

    .room-card p {
        color: #555;
    }
</style>
@endsection
