<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests\RoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Models\Reservation;
class RoomController extends Controller {
    public function index(Request $request) {
        if ($request->ajax()) {
            $rooms = Room::select('*');

            return DataTables::of($rooms)->addColumn('action',function($room){
                return view('admin.rooms.action', compact('room'));
            })->rawColumns(['action'])->make(true);
        }


        return view('admin.rooms.index');
    }

    public function create() {
        return view('admin.rooms.create');
    }

    public function store(RoomRequest $request) {
        $room = Room::create($request->validated());
        return redirect()->route('rooms.index')->with('success', 'Room updated successfully!');

    }
    public function show(Room $room) {
        return view('admin.rooms.show', compact('room'));
    }
    public function edit(Room $room) {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(RoomRequest $request, Room $room) {


        $room->update($request->validated());
    return redirect()->route('rooms.index')->with('success', 'Room updated successfully!');
    }

    public function destroy(Room $room) {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully!');
    }
}
