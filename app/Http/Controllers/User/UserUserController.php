<?php

namespace App\Http\Controllers\User;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Comment;

class UserUserController extends Controller
{
    public function dashboard()
    {
        $reservations = Reservation::where('customer_email', Auth::user()->email)->orderBy("check_in", "desc")->get()->take(4);
        return view('users.dashboard', compact('reservations'));
    }
    public function bookings(Request $request)
        {
            // dd('hello');
            if ($request->ajax()) {
                // dd('hello');
            $reservations = Reservation::with('room'
            )->select("*")->where('customer_email', Auth::user()->email);
            return DataTables::of($reservations)->make(true);
}

    return view('users.bookings');
}

    public function pending( Request $request){

            // dd('hello');
            $reservations = Reservation::where('customer_email', Auth::user()->email)->with('room')->where("status","pending")->get();

        return view('users.rooms.pending',['reservations' => $reservations]);



    }
    public function comment( Request $request, $id){
        if ($request->isMethod('post')) {
            $message=$request->input('message');
            $reservation_id=$id;
            $user='user';

            $comment = new Comment;
            $comment->reservation_id=$reservation_id;
            $comment->comment=$message;
            $comment->user_type=$user;
            if ($request->hasFile('file')) {
                $file = $request->file('file');

                $request->validate([
                    'file' => 'mimes:jpg,jpeg,png,pdf,doc,docx|max:20480' // 2MB Max
                ]);

                $path = $file->store('uploads', 'public');

                $comment->document = $path;
            } else {
                $comment->document = null;
            }

            $comment->save();

        }
        $reservations = Reservation::with('room')->find($id);
        $comments=Comment::where("reservation_id",$id)->get();

return view('users.rooms.comment', ['reservations' => $reservations,"comments"=>$comments]);
    }
}
