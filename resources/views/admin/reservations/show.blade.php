@extends('admin.home')

@section('content')
<div class="container">
    <h2 class="mb-4">Reservation Details</h2>

    <div class="card">
        <div class="card-header">
            Reservation #{{ $reservation->id }}
        </div>
        <div class="card-body">
            <p><strong>Room:</strong> {{ $reservation->room->room_number }} - {{ ucfirst($reservation->room->room_type) }}</p>
            <p><strong>Customer Name:</strong> {{ $reservation->customer_name }}</p>
            <p><strong>Email:</strong> {{ $reservation->customer_email }}</p>
            <p><strong>Phone:</strong> {{ $reservation->customer_phone }}</p>
            <p><strong>Check-in:</strong> {{ \Carbon\Carbon::parse($reservation->check_in)->format('d M Y') }}</p>
            <p><strong>Check-out:</strong> {{ \Carbon\Carbon::parse($reservation->check_out)->format('d M Y') }}</p>
            <p><strong>Number of Guests:</strong> {{ $reservation->guests }}</p>
            <p><strong>Status:</strong> <span class="badge bg-{{ $reservation->status == 'confirmed' ? 'success' : ($reservation->status == 'cancelled' ? 'danger' : 'warning') }}">{{ ucfirst($reservation->status) }}</span></p>
        </div>
    </div>

    <!-- Buttons -->
    <div class="mt-3">
        <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Back to List</a>
        <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-primary">Edit</a>

        <!-- Delete Form -->
        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this reservation?')">Delete</button>
        </form>
    </div>
</div>
@endsection
