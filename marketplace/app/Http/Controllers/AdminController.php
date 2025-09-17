<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function updateRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|in:user,vendor,admin',
        ]);

        $user = User::find($request->user_id);
        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'User role updated successfully.');
    }
}
