<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return response()->json([
            'message' => 'Data User Berhasil Ditampilkan',
            'data' => $user
        ], 200);
    }

    public function role()
    {
        $user = Auth::user();
        if ($user) {
            return response()->json([
                'role' => $user->role // pastikan kolom 'role' ada di tabel users
            ], 200);
        } else {
            return response()->json([
                'message' => 'User belum login'
            ], 401);
        }
    }
}
