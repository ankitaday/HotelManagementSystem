@extends('admin.home')

@section('content')
<div class="container">
    <h2 class="mb-4">Reservations</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add New Reservation Button -->
    <a href="{{ route('reservations.create') }}" class="btn btn-primary mb-3">Add New Reservation</a>

                <!-- Filter by Status -->
                <form method="GET" action="{{ route('reservations.index') }}" class="mb-3">
                    <div class="d-flex align-items-center">
                        <label for="status" class="me-2 fw-bold">Filter by Status:</label>
                        <select name="status" id="status" class="form-select w-auto" onchange="this.form.submit()">
                            <option value="">All</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>confirmed</option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                </form>
    <table class="table table-bordered" id="reservation-table">
        <thead>
            <tr>

                <th>Room Number</th>
                <th>Customer</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Status</th>
                <th>Guests</th>
                <th>Actions</th>
            </tr>
        </thead>


        {{-- <tbody>
        @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->room->room_number }}</td>
                <td>{{ $reservation->customer_name }}</td>
                <td>{{ $reservation->check_in }}</td>
                <td>{{ $reservation->check_out }}</td>
                <td>{{ $reservation->status }}</td>
                <td>{{ $reservation->guests }}</td>
                <td>
                    <a href="{{ route('reservations.show', ['reservation' => $reservation->id]) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody> --}}
        <script>
         $(document).ready(function() {
            $('#reservation-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('reservations.index') }}',
                columns: [

                { data: 'room.room_number', name: 'room.room_number' },
                { data: 'customer_name', name: 'reservations.customer_name' },
                { data: 'check_in', name: 'reservations.check_in' },
                { data: 'check_out', name: 'reservations.check_out' },
                { data: 'status', name: 'reservations.status' },
                { data: 'guests', name: 'reservations.guests' },
                { data: 'actions', name: 'actions' }
               ]
            })
        });</script>

    </table>

</div>
@endsection
