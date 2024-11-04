<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function getRolePermission(Request $request,$roleId){
        $role = Role::select('id','name')->where('id','=',$roleId)->first();
        $permissions = Permission::all();
        $selectedPermissions = DB::table('role_has_permissions')
                                  ->where('role_id','=',$roleId)
                                  ->pluck('permission_id')
                                  ->all();
        return view('get_role_permission',[
            'role'=>$role,
            'permissions'=>$permissions,
            'selectedPermissions'=> $selectedPermissions
        ]);

    }

    public function syncRolePermission(Request $request,$roleId){
      $role = Role::select('id','name','guard_name')->findOrFail($roleId);
      $permissions = $request->input('permissions');
      $role->syncPermissions($permissions);
      return redirect()->back()->with('status',"Permission assigned successfully for {$role->name}");
    }
}
