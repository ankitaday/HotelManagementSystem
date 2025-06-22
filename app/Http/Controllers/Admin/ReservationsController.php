<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\ReservationRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Room;

class ReservationsController extends Controller
{

    public function index(Request $request)
{


    if ($request->ajax()) {

        $reservations = Reservation::with('room'
        )->select("*")->get();
        return DataTables::of($reservations)
            ->addColumn('actions', function($reservation) {
                return view('admin.reservations.actions', ['id' => $reservation->id])->render();
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    return view('admin.reservations.index');
}


    public function create()
    {
        $rooms = Room::where('status', 'available')->get();
        return view('admin.reservations.create', compact('rooms'));
    }


    public function store(ReservationRequest $request)
    {
        $reservation = Reservation::create($request->all());



        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully!');
    }


    public function show(String $id)
    {

        $reservation = Reservation::with('room')->findOrFail($id);
        return view('admin.reservations.show', compact('reservation'));
    }


    public function edit(Reservation $reservation)
    {

        $rooms = Room::where('status', 'available')->get();
        return view('admin.reservations.edit', compact('reservation', 'rooms'));
    }


    public function update(ReservationRequest $request, Reservation $reservation)
    {
        $reservation->fill($request->all()); // Apply changes
        $reservation->save(); // Now, the 'updating' event will trigger

        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully!');
    }



    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully!');
    }
}
