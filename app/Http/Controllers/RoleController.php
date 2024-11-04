<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function roleList(){
        $roles = Role::select('id','name')->get();
        return view('role_list',['roles'=>$roles]);
    }

    public function assignRole(Request $request,$userId){
       $user = User::select('id','name')->find($userId);
       $roles = Role::select('id','name','guard_name')->get();
       $selectedRoles = DB::table('model_has_roles')
            ->where('model_id', '=', $userId)
            ->pluck('role_id')
            ->all();
       return view('role_to_user',[
        'user'=>$user,
        'roles'=> $roles,
        'selectedRoles'=> $selectedRoles
       ]);
    }

    public function applyRoleToUser(Request $request , $userId){
        $roles = $request->input('roles');
        $user = User::select('id', 'name')->find($userId);
        $user->syncRoles($roles);
        return redirect()->back()->with('status','Role assigned to user successfully');
    }
}
