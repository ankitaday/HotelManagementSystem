@extends('users.home')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Available {{ ucfirst($type) }} Rooms</h2>

    @if($rooms->isEmpty())
        <p class="text-center">No available rooms for this type. Please check back later.</p>
    @else
        <div class="row">
            @foreach ($rooms as $room)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('images/' . strtolower($room->room_type) . '-room.jpg') }}" class="card-img-top" alt="{{ $room->room_type }} Room">
                        <div class="card-body text-center">
                            <h5 class="card-title">Room {{ $room->room_number }}</h5>
                            <p><strong>Floor:</strong> {{ $room->floor }}</p>
                            <p><strong>View:</strong> {{ $room->view }}</p>
                            <p><strong>AC Type:</strong> {{ $room->ac_type }}</p>
                            <p><strong>Max Occupancy:</strong> {{ $room->max_occupancy }}</p>
                            <p><strong>Price:</strong> ${{ $room->price }}/night</p>
                            <a href="{{ route('userroom.edit', $room->id) }}" class="btn btn-primary">Confirm Booking</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
