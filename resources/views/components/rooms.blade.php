
<div class="container mt-5">
    <h2 class="text-center mb-4">Choose Your Room Type</h2>

    <div class="row">
        <!-- Single Room -->
        <div class="col-md-4">
            <div class="card room-card">
                <img src="{{ asset('images/single-room.jpg') }}" class="card-img-top" alt="Single Room">
                <div class="card-body text-center">
                    <h5 class="card-title">Single Room</h5>
                    <p class="card-text">Perfect for solo travelers looking for comfort and affordability.</p>
                    <a href="{{ route('userroom.type', ['type' => 'single']) }}" class="btn btn-primary">Book Now</a>
                </div>
            </div>
        </div>

        <!-- Double Room -->
        <div class="col-md-4">
            <div class="card room-card">
                <img src="{{ asset('images/double-room.jpg') }}" class="card-img-top" alt="Double Room">
                <div class="card-body text-center">
                    <h5 class="card-title">Double Room</h5>
                    <p class="card-text">Comfortable and Ideal for couples or friends traveling together.</p>
                    <a href="{{ route('userroom.type', ['type' => 'double']) }}" class="btn btn-success">Book Now</a>
                </div>
            </div>
        </div>

        <!-- Suite Room -->
        <div class="col-md-4">
            <div class="card room-card">
                <img src="{{ asset('images/suite-room.jpg') }}" class="card-img-top" alt="Suite Room">
                <div class="card-body text-center">
                    <h5 class="card-title">Suite</h5>
                    <p class="card-text">Experience luxury with our spacious and premium suite rooms.</p>
                    <a href="{{ route('userroom.type', ['type' => 'suite']) }}" class="btn btn-warning">Book Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{ $slot }}

@section('styles')
<style>
    body {
        background-color: #f4f4f4;
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    h2 {
        font-size: 2.5em;
        color: #333;
    }

    .room-card {
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }

    .room-card:hover {
        transform: scale(1.05);
    }

    .card-title {
        font-size: 1.5em;
        color: #007bff;
    }

    .card-text {
        color: #555;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn-primary {
        background-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-success {
        background-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-warning {
        background-color: #ffc107;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }
    img{
        width: 140px;
        height: 200px;
    }
</style>
@endsection
