<?php

namespace App\Http\Controllers\User;
use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;

class UserRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('users.rooms.index', compact('rooms'));
    }
    public function showByType($type)
    {
        $rooms = Room::where('room_type', ucfirst($type))
                     ->where('status', 'available')
                     ->get();

        return view('users.rooms.available', compact('rooms', 'type'));
    }
    /**
     * Show the form for creating a new resource.
     */

    public function bookRoom(Request $request, Room $room)
    {
        if ($room->status !== 'available') {
            return redirect()->back()->with('error', 'This room is no longer available.');
        }

        // Update room status
        $room->status = 'occupied';
        $room->save();

        return redirect()->route('userroom.index')->with('success', 'Room booked successfully!');
    }



 public function store(ReservationRequest $request){
    // dd($request->all());
    $reservation = Reservation::create($request->all());
    return redirect()->route('userroom.index')->with('success', 'Reservation created successfully!');
 }

    public function edit(String $id)
    {


        $rooms = Room::findOrFail($id);
        return view('users.rooms.edit', compact('rooms'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationRequest $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

    // Update the reservation with the validated request data
    $reservation->status = 'cancelled';
    $reservation->save();
    // Redirect with success message
    return redirect()->route('userroom.index')->with('success', 'Reservation updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
