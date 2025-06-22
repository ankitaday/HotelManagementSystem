@extends('admin.home')

@section('content')
<div class="container">
    <h2>User Details</h2>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $user->name }}</h4>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> User</p>
            <p><strong>Created At:</strong> {{ $user->created_at->format('d M Y, h:i A') }}</p>
            <p><strong>Updated At:</strong> {{ $user->updated_at->format('d M Y, h:i A') }}</p>
        </div>
    </div>
    <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Back to Users</a>
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary mt-3">Edit User</a>

    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="mt-3 d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">
            Delete User
        </button>
    </form>
</div>
@endsection
