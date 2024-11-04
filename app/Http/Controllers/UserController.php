<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('permission:edit')->only(['userEdit']);
        $this->middleware('permission:delete')->only(['userDelete']);
    }
    public function index(){
        $usersWithRoles = User::select('id', 'name')
            ->with(['roles:id,name']) // Use Spatie's predefined roles relationship
            ->get();
        $users=User::select('id','name','email')->get();
        return view('dashboard',[
            'users'=>$users,
            'usersWithRoles'=> $usersWithRoles
        ]);
    }

    function userEdit(){
        return 'Edit';
    }

    function userDelete()
    {
        return 'Delete';
    }
}
