@extends('admin.home')

@section('content')
<div class="container">
    <h2 class="mb-4">Admin Dashboard</h2>

    <div class="row">
        <!-- Cards -->
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Reservations</h5>
                    <p class="card-text">{{ $totalReservations }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Rooms</h5>
                    <p class="card-text">{{ $totalRooms }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pending Reservations</h5>
                    <p class="card-text">{{ $pendingReservations }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Reservations Table -->
    <div class="card mt-4">
        <div class="card-header">
            <h5>Latest Reservations</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="reservations-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Room</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Status</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Move Script Outside -->
<script>
    $(document).ready(function() {
        $('#reservations-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.dashboard') }}',
            columns: [
                { data: 'id', name: 'reservations.id' },
                { data: 'customer_name', name: 'reservations.customer_name' }, // Fetch customer email from relation
                { data: 'room.room_number', name: 'room.room_number' }, // Fetch room number from relation
                { data: 'check_in', name: 'reservations.check_in' },
                { data: 'check_out', name: 'reservations.check_out' },
                { data: 'status', name: 'reservations.status' }
            ]
        });
    });
</script>
@endsection
