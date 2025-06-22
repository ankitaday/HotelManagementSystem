@extends('users.home')

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

    @if(!$rooms)
        <p class="text-center">No available rooms for this type. Please check back later.</p>
    @else
        <div class="row">

                <div class="col-md-4">
                    <div class="card" style="border: 4px solid #007bff97;">
                        {{-- <img src="{{ asset('images/' . strtolower($rooms->room_type) . '-room.jpg') }}" class="card-img-top" alt="{{ $rooms->room_type }} Room"> --}}
                        <div class="card-body text-center">
                            <h5 class="card-title">Room {{ $rooms->room_number }}</h5>
                            <p><strong>Floor:</strong> {{ $rooms->floor }}</p>
                            <p><strong>View:</strong> {{ $rooms->view }}</p>
                            <p><strong>AC Type:</strong> {{ $rooms->ac_type }}</p>
                            <p><strong>Max Occupancy:</strong> {{ $rooms->max_occupancy }}</p>
                            <p><strong>Price:</strong> ${{ $rooms->price }}/night</p>
                            {{-- <a href="{{ route('userroom.edit', $rooms->id) }}" class="btn btn-primary">Confirm Booking</a> --}}
                        </div>
                    </div>
                </div>
        </div>
        <form method="POST" action="{{ route('userroom.store', $rooms->id) }}">
            @csrf
            {{-- @method('PUT') --}}
            <div class="mb-3">
                <label for="room_id" class="form-label" hidden>Select Room</label>
                <input type="text" class="form-control" name="room_id" id="room_id" value="{{ $rooms->id }}" readonly hidden>
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
                <label for="room_status" class="form-label">Status</label>
                <input type="text" class="form-control" name="room_status" id="room_status" value="{{ $rooms->status }}" readonly>
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

            <!-- Status field (read-only) -->
            <div class="mb-3">
                <label for="status" class="form-label">Reservation Status</label>
                <input type="text" class="form-control" name="status" id="status" value="confirmed" readonly>
            </div>

            <button type="submit" class="btn btn-primary" id="submit-button" disabled>Create Reservation</button>
            {{-- <a href="#" class="btn btn-secondary">Cancel</a> --}}
        </form>
    @endif

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roomStatus = document.getElementById('room_status').value;
        const submitButton = document.getElementById('submit-button');

        // Enable the button only if the room status is "confirmed"
        if (roomStatus == 'available') {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    });
</script>
@endsection
