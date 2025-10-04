<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function user(Request $req)
    {
        // kembalikan data user yang login
        return response()->json($req->user());
    }
}
