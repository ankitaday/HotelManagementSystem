<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Room;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $reservations = Reservation::with('user', 'room');

            return DataTables::of($reservations)->make(true);
        }

        // Fetch counts
        $totalReservations = Reservation::count();
        $totalUsers = User::count();
        $totalRooms = Room::count();
        $pendingReservations = Reservation::where('status', 'pending')->count();

        // Fetch latest reservations
        $latestReservations = Reservation::latest()->take(5)->get();

        return view('admin.dashboard.index', compact(
            'totalReservations', 'totalUsers', 'totalRooms', 'pendingReservations', 'latestReservations'
        ));
    }
}
