@extends('admin.home')
{{-- @extends('admin.layouts.app') --}}

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4><i class="fas fa-plus-circle"></i> Add New Room</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('rooms.store') }}" method="POST">
                @csrf

                <!-- Room Number -->
                <div class="mb-3">
                    <label for="room_number" class="form-label">Room Number</label>
                    <input type="text" class="form-control @error('room_number') is-invalid @enderror"
                           id="room_number" name="room_number" value="{{ old('room_number') }}" required>
                    @error('room_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Room Type -->
                <div class="mb-3">
                    <label for="room_type" class="form-label">Room Type</label>
                    <select class="form-select @error('room_type') is-invalid @enderror"
                            id="room_type" name="room_type" required>
                        <option selected disabled>Select Room Type</option>
                        <option value="Single">Single</option>
                        <option value="Double">Double</option>
                        <option value="Suite">Suite</option>
                    </select>
                    @error('room_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Floor -->
                <div class="mb-3">
                    <label for="floor" class="form-label">Floor</label>
                    <select class="form-select @error('floor') is-invalid @enderror" id="floor" name="floor" required>
                        <option selected disabled>Select Floor</option>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                    </select>
                    @error('floor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Bed Count -->
                <div class="mb-3">
                    <label for="bed_count" class="form-label">Number of Beds</label>
                    <input type="number" class="form-control @error('bed_count') is-invalid @enderror"
                           id="bed_count" name="bed_count" value="{{ old('bed_count') }}" required>
                    @error('bed_count')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- View -->
                <div class="mb-3">
                    <label for="view" class="form-label">View</label>
                    <select class="form-select @error('view') is-invalid @enderror" id="view" name="view" required>
                        <option value="City" selected>City</option>
                        <option value="Garden">Garden</option>
                        <option value="Sea">Sea</option>
                        <option value="Pool">Pool</option>
                    </select>
                    @error('view')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Has Balcony -->
                <div class="mb-3">
                    <label class="form-label">Balcony</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="has_balcony" id="balcony_yes" value="1" checked>
                        <label class="form-check-label" for="balcony_yes">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="has_balcony" id="balcony_no" value="0">
                        <label class="form-check-label" for="balcony_no">No</label>
                    </div>
                </div>

                <!-- Max Occupancy -->
                <div class="mb-3">
                    <label for="max_occupancy" class="form-label">Max Occupancy</label>
                    <input type="number" class="form-control @error('max_occupancy') is-invalid @enderror"
                           id="max_occupancy" name="max_occupancy" value="{{ old('max_occupancy') }}" required>
                    @error('max_occupancy')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- AC Type -->
                <div class="mb-3">
                    <label for="ac_type" class="form-label">AC Type</label>
                    <select class="form-select @error('ac_type') is-invalid @enderror" id="ac_type" name="ac_type" required>
                        <option selected disabled>Select AC Type</option>
                        <option value="AC">AC</option>
                        <option value="Non-AC">Non-AC</option>
                    </select>
                    @error('ac_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label for="price" class="form-label">Price ($)</label>
                    <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                           id="price" name="price" value="{{ old('price') }}" required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Room Status -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="available" selected>Available</option>
                        <option value="occupied">Occupied</option>
                        <option value="maintenance">Maintenance</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Availability -->
                <div class="mb-3">
                    <label class="form-label">Availability</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="availability" id="available_yes" value="1" checked>
                        <label class="form-check-label" for="available_yes">Available</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="availability" id="available_no" value="0">
                        <label class="form-check-label" for="available_no">Not Available</label>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror"
                              id="description" name="description" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('rooms.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Save Room
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- FontAwesome Icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
@endsection
