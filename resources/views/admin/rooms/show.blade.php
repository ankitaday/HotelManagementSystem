@extends('admin.home')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Room Details</h2>
        </div>
        <div class="card-body">
            <p><strong>Room Number:</strong> {{ $room->room_number }}</p>
            <p><strong>Room Type:</strong> {{ $room->room_type }}</p>
            <p><strong>Floor:</strong> {{ $room->floor }}</p>
            <p><strong>Bed Count:</strong> {{ $room->bed_count }}</p>
            <p><strong>View:</strong> {{ $room->view }}</p>
            <p><strong>Balcony:</strong> {{ $room->has_balcony ? 'Yes' : 'No' }}</p>
            <p><strong>Max Occupancy:</strong> {{ $room->max_occupancy }}</p>
            <p><strong>AC Type:</strong> {{ $room->ac_type }}</p>
            <p><strong>Price per Night:</strong> ${{ number_format($room->price, 2) }}</p>
            <p><strong>Status:</strong>
                @if ($room->status == 'available')
                    <span class="badge bg-success">Available</span>
                @elseif ($room->status == 'occupied')
                    <span class="badge bg-danger">Occupied</span>
                @else
                    <span class="badge bg-warning">Under Maintenance</span>
                @endif
            </p>
            <p><strong>Availability:</strong> {{ $room->availability ? 'Yes' : 'No' }}</p>
            <p><strong>Description:</strong> {{ $room->description ?? 'No description available' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection
