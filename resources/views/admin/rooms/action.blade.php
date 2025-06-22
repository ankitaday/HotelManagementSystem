<a href="{{ route('rooms.show', $room->id) }}" class="btn btn-primary">View</a>
<a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning">Edit</a>
<form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
