
@include('layouts.nav')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 bg-dark text-white">

            @include('layouts.sidebar')
        </div>

        <!-- Main Content -->
        <div class="col-md-10 p-4">

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-black">Room Management</h2>
        <a href="{{ route('rooms.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Add Room
        </a>
    </div>

                <!-- Filter by Status -->
                <form method="GET" action="{{ route('rooms.index') }}" class="mb-3">
                    <div class="d-flex align-items-center">
                        <label for="status" class="me-2 fw-bold">Filter by Status:</label>
                        <select name="status" id="status" class="form-select w-auto" onchange="this.form.submit()">
                            <option value="">All</option>
                            <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="occupied" {{ request('status') == 'occupied' ? 'selected' : '' }}>Occupied</option>
                            <option value="maintenance" {{ request('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                        </select>
                    </div>
                </form>
    <!-- Room Table -->
    <div class="table-responsive shadow p-3 bg-white rounded">
        <table class="table table-hover text-center" id="rooms-table">
            <thead class="bg-dark text-white">
                <tr>
                    {{-- <th>#</th> --}}
                    <th>Room Number</th>
                    <th>Room Type</th>
                    <th>Floor</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach($rooms as $room)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{ $room->room_number }}</strong></td>
                    <td>{{ $room->room_type }}</td>
                    <td>{{ $room->floor }}</td>
                    <td><span class="badge bg-primary">${{ number_format($room->price, 2) }}</span></td>
                    <td>
                        <span class="badge
                            {{ $room->status == 'available' ? 'bg-success' :
                            ($room->status == 'occupied' ? 'bg-danger' : 'bg-warning') }}">
                            {{ ucfirst($room->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST"
                            style="display:inline;"
                            onsubmit="return confirm('Are you sure you want to delete this room?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody> --}}

        </table>
        {{-- <div class="mt-4">
            {{ $rooms->links('vendor.pagination.bootstrap-4') }} <!-- Use the custom pagination view -->
        </div> --}}
    </div>
</div>

        </div>
    </div>

</div>
<script>
    $(document).ready(function() {

        $('#rooms-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('rooms.index') }}',
            columns: [
                { data: 'room_number', name: 'rooms.room_number' },
                { data: 'room_type', name: 'rooms.room_type' },
                { data: 'floor', name: 'rooms.floor' },
                { data: 'price', name: 'rooms.price' },
                { data: 'status', name: 'rooms.status' }, 

                { data: 'action', name: 'action' },

            ]
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- FontAwesome Icons -->

