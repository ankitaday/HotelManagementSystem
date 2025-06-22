@extends('admin.home')

@section('content')
    <style>
        .reservation-form {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .reservation-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .reservation-form label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        .reservation-form input,
        .reservation-form select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .reservation-form button {
            width: 100%;
            background: #007bff;
            color: white;
            border: none;
            padding: 12px;
            font-size: 18px;
            margin-top: 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .reservation-form button:hover {
            background: #0056b3;
        }
    </style>

    <div class="reservation-form">
        <h2>Edit Reservation</h2>

        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Customer Name:</label>
            <input type="text" name="customer_name" value="{{ $reservation->customer_name }}" required>

            <label>Customer Email:</label>
            <input type="email" name="customer_email" value="{{ $reservation->customer_email }}" required>

            <label>Customer Phone:</label>
            <input type="text" name="customer_phone" value="{{ $reservation->customer_phone }}" required>

            <label>Check-in Date:</label>
            <input type="date" name="check_in" value="{{ $reservation->check_in }}" required>

            <label>Check-out Date:</label>
            <input type="date" name="check_out" value="{{ $reservation->check_out }}" required>

            <label>Room:</label>
            <select name="room_id">
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}" {{ $reservation->room_id == $room->id ? 'selected' : '' }}>
                        Room {{ $room->room_number }} - {{ $room->room_type }}
                    </option>
                @endforeach
            </select>
            <div class="mb-3">
                <label for="guests" class="form-label">Number of Guests</label>
                <input type="number" class="form-control" name="guests" id="guests" value="{{ $reservation->guests }}" min="1" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Reservation Status</label>
                <select class="form-control" name="status" id="status">
                    <option value="pending"  {{ $reservation->status == "pending" ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ $reservation->status == "confirmed" ? 'selected' : '' }}>Confirmed</option>
                    <option value="cancelled" {{ $reservation->status == "cancelled" ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <button type="submit">Update Reservation</button>
        </form>
    </div>
@endsection
