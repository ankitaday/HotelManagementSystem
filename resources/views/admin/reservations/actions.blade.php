<a href="{{ route('reservations.show',  $id) }}" class="btn btn-primary">View</a>
<a href="{{ route('reservations.edit', $id) }}" class="btn btn-warning">Edit</a>
<form action="{{ route('reservations.destroy', $id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
