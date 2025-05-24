<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function verifyUsers()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.userluar.list', compact('users'));
    }

    public function verifyUser($id)
    {
        $user = User::findOrFail($id);

        // Toggle is_verified
        $user->update([
            'is_verified' => !$user->is_verified,
        ]);

        $message = $user->is_verified ? 'Pengguna berhasil diverifikasi.' : 'Verifikasi pengguna berhasil dibatalkan.';

        return back()->with('success', $message);
    }
}
