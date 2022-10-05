<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

use Illuminate\Log\Logger;

class HomeController extends Controller
{
    // 
    private $users;
    public function __construct()
    {
        $this->users = new User();
    }
    
    public function index()

    {
        $users = Redis::get('home:users');
        if(is_null($users)) {
            $users = $this->users->getAllUsers();
            Redis::set('home:users', json_encode($users));
        } else {
            $users = json_decode($users);
        }



        return view('home.index', ['users' => $users]);
    }

    // 
    public function getDetail($id) {
        $users = DB::select('select * from users where users.id = '.$id.' limit 1' );
        return view('home.detail', ['users' => $users]);
    }

    public function addUser() {
        return view('home.create');
    }

    public function addUserPost(Request $request) {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => "required"
        ]);
        $data = [
            10,
            $request->name,
            $request->email,
            $request->password,
        ];
        $this->users->addUser($data);
        return redirect()->route('home.index')->with('msg', 'add user successfully');
    }


    public function editUser(Request $request, $id) {
        $users = $this->users->getDetailUser($id);
        $request->session()->put('id', $id);
        return view('home.detail', ['users' => $users]);
    }

    public function postEditUser(Request $request) {
        $id = session('id');
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => "required"
        ]);

        $data = [
            $request->name,
            $request->email,
        ];
        $this->users->editUser($data,  $id);
        return redirect()->route('home.index')->with('msg', 'edit user successfully');
    }
}
