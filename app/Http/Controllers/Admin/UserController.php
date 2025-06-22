<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $users = User::select('*');
            return DataTables::of($users)->addColumn('action',function($user){
                return view('admin.users.action', compact('user'));
            })->rawColumns(['action'])->make(true);
        }
        return view('admin.users.index');
    }
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserRequest $request)
        {
            $data = $request->all();
            $data['password'] = bcrypt($request->password);
            if ($request->role === 'admin') {
                $user = \App\Models\Admin::create($data); // Save in admins table
            } else {
                $user = \App\Models\User::create($data); // Save in users table
            }

            return redirect()->route('users.index')->with('success', 'User created successfully!');
        }



    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();

        // If password is provided, hash it before updating
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']); // Prevent overwriting with null
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
