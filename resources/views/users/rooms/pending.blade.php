@extends('users.home')
@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Pending Requests</h2>
    <div class="bookings-container">


        <div class="bookings-card">
            {{-- @if ($reservations->count() > 0) --}}
                <table class="styled-table" id="reservation-table">
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
                                <a href="{{ route('comment', $reservation->id) }}" class="btn btn-warning">Comment</a>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
            </table>




        </div>

</div>
@endsection
