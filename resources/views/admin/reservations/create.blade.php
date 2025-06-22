@extends('admin.home')

@section('content')
<div class="container">
    <h2 class="mb-4">Create New Reservation</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="room_id" class="form-label">Select Room</label>
            <select class="form-control" name="room_id" id="room_id" required>
                <option value="">Choose a Room</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->room_number }} - {{ ucfirst($room->room_type) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="customer_name" class="form-label">Customer Name</label>
            <input type="text" class="form-control" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="customer_email" class="form-label">Customer Email</label>
            <input type="email" class="form-control" name="customer_email" id="customer_email" value="{{ old('customer_email') }}" required>
        </div>

        <div class="mb-3">
            <label for="customer_phone" class="form-label">Customer Phone</label>
            <input type="text" class="form-control" name="customer_phone" id="customer_phone" value="{{ old('customer_phone') }}" required>
        </div>

        <div class="mb-3">
            <label for="check_in" class="form-label">Check-in Date</label>
            <input type="date" class="form-control" name="check_in" id="check_in" value="{{ old('check_in') }}" required>
        </div>

        <div class="mb-3">
            <label for="check_out" class="form-label">Check-out Date</label>
            <input type="date" class="form-control" name="check_out" id="check_out" value="{{ old('check_out') }}" required>
        </div>

        <div class="mb-3">
            <label for="guests" class="form-label">Number of Guests</label>
            <input type="number" class="form-control" name="guests" id="guests" value="{{ old('guests', 1) }}" min="1" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Reservation Status</label>
            <select class="form-control" name="status" id="status">
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Reservation</button>
        <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
