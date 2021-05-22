<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission){
        $this->role = $role;
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [];
        $roles = Role::get();
        // $roleOfUser = DB::table('roles')
        //     ->join('users', 'users.role_id', '=' , 'roles.id')
        //     ->where('roles.id', $roles)
        //     ->select('roles.*')
        //     ->get()->count();
            
        // dd($roleOfUser);
        $data['roles'] = $roles;
        return view('admin.roles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [];
        $permissions = Permission::get(); 
        $data['permissions'] = $permissions;
        return view('admin.roles.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        try {
            DB::beginTransaction();
            // insert data table role
            $roleCreate = $this->role->create([
                'name' => $request->name
            ]);
            // insert data table permisson_role

            $roleCreate->permissions()->attach($request->permission);
            DB::commit();
            // success
            return redirect()->route('admin.role.index')->with('success', 'Insert successful!');
            // dd($request->permission);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->back()->with('error', $ex->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $permissions = Permission::get(); 
        $roles = Role::findOrFail($id);

        $getAllPermissionOfRole = DB::table('permission_role')->where('role_id', $id)->pluck('permission_id');

        $data['roles'] = $roles;
        $data['permissions'] = $permissions;
        $data['getAllPermissionOfRole'] = $getAllPermissionOfRole;
        // dd($getAllPermissionOfRole);
        return view('admin.roles.edit', $data);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            // update to table role
            $this->role->where('id',$id)->update([
                'name'=>$request->name,
            ]);

            // update to table permission_role
            DB::table('permission_role')->where('role_id', $id)->delete();
            $roleCreate = $this->role->find($id);
            $roleCreate->permissions()->attach($request->permission);

            DB::commit();
            // success
            return redirect()->route('admin.role.index')->with('success', 'Edit successful!');
            // dd($request->permission);
        } catch (\Exception $ex) {
            DB::rollback();

            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            // delete to table role

            $role = $this->role->find($id);
            $role->permissions()->detach();// phải xóa ở table permission_role trc để kh bị ràng buộc dữ liệu
            $role->delete();

            // delete to table permission_role
            
            
            DB::commit();
            // success
            return redirect()->route('admin.role.index')->with('success', 'Delete successful!');
            // dd($request->permission);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
