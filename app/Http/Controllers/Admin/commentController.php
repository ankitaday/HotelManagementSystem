<?php

namespace App\Http\Controllers\Admin;
use App\Models\Comment;
use App\Models\Reservation;

use Illuminate\Http\Request;

class commentController extends Controller
{

    public function pending( Request $request){

        // dd('hello');
        $reservations = Reservation::with('room')->where("status","pending")->get();

    return view('admin.rooms.pending',['reservations' => $reservations]);



}
    public function comment( Request $request, $id){
        if ($request->isMethod('post')) {
            $message=$request->input('message');
            $reservation_id=$id;
            $user='admin';

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

return view('admin.rooms.comment', ['reservations' => $reservations,"comments"=>$comments]);
    }
}

