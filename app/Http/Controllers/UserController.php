<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function createUser() {
        // do something
        // $user = new User();
        // $allUser = $user::all();
        // dd($allUser);
    }

    public function testRequest(Request $req) {
        // do something
        return $req;
    }
}
