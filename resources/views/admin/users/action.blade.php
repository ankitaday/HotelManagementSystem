<a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">View</a>
<a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
<form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
