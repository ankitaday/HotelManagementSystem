@extends('users.home')

@section('content')
<div class="bookings-container">
    <h2 class="bookings-title">My Bookings History</h2>

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
                    </tr>
                </thead>

                {{-- <tbody>
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
                        </tr>
                    @endforeach
                </tbody> --}}
            </table>
            {{-- <div class="pagination-links">
                {{ $reservations->links() }} <!-- Laravel Pagination -->
            </div> --}}
        {{-- @else
            <p class="no-reservations">You have no past bookings.</p>
        @endif --}}
    </div>
</div>
<script>
    $(document).ready(function() {

       $('#reservation-table').DataTable({

           processing: true,
           serverSide: true,
           ajax: '{{ route('bookings') }}',
           columns: [

           { data: 'room.room_number', name: 'room.room_number' },
           { data: 'room.room_type', name:'room.room_type'},
           { data: 'check_in', name: 'reservations.check_in' },
           { data: 'check_out', name: 'reservations.check_out' },
            { data: 'price', name: 'room.price' },
            { data: 'status', name: 'reservations.status' },
           { data: 'guests', name: 'reservations.guests' },

          ]
       })
   });</script>
@endsection
