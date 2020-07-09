<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereIn('role', ['user', 'moderator'])->get();;
        return view('pages.users', compact('users'));
    }
    public function status(Request $request, $id)
    {
        $user = User::find($id);
        $user->update(['status' => $request->status]);
        return redirect()->back();
    }
    public function role(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['role' => $request->role]);
        return redirect()->back();
    }
}
