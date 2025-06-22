@extends('admin.home')

@section('content')
<style>
    .container {
        width: 90%;
        margin: 50px auto;
        font-family: Arial, sans-serif;
    }

    h2 {
        text-align: center;
        margin-bottom: 30px;
    }

    .bookings-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .styled-table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }

    .styled-table th, .styled-table td {
        border: 1px solid #ddd;
        padding: 10px;
    }

    .styled-table th {
        background-color: #f4f4f4;
        color: #333;
    }

    .styled-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .styled-table tr:hover {
        background-color: #e9e9e9;
    }

    .status-badge {
        padding: 5px 10px;
        border-radius: 5px;
        color: white;
        font-weight: bold;
    }

    .pending {
        background-color: orange;
    }

    .confirmed {
        background-color: green;
    }

    .cancelled {
        background-color: red;
    }

    .btn-warning {
        background-color: #ff9800;
        color: white;
        padding: 6px 12px;
        text-decoration: none;
        border-radius: 5px;
        display: inline-block;
    }

    .btn-warning:hover {
        background-color: #e68a00;
    }
</style>

<div class="container">
    <h2>Pending Requests</h2>
    <div class="bookings-container">
        <div class="bookings-card">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Room Number</th>
                        <th>Room Type</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Guests</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->room->room_number }}</td>
                            <td>{{ $reservation->room->room_type }}</td>
                            <td>{{ $reservation->check_in }}</td>
                            <td>{{ $reservation->check_out }}</td>
                            <td>${{ number_format($reservation->room->price, 2) }}</td>
                            <td>
                                <span class="status-badge
                                    @if ($reservation->status == 'pending') pending
                                    @elseif ($reservation->status == 'confirmed') confirmed
                                    @else cancelled @endif">
                                    {{ ucfirst($reservation->status) }}
                                </span>
                            </td>
                            <td>{{ number_format($reservation->guests, 0) }}</td>
                            <td>
                                <a href="{{ route('adminComment', $reservation->id) }}" class="btn-warning">Comment</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
