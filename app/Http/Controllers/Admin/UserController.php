<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $users = User::get();
        $data['users'] = $users;
        return view('admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $roles = Role::pluck('name','id')->toArray();
        $data['roles'] = $roles;
        return view('admin.users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $avatarPath = null;
        if ($request->hasFile('avatar') 
            && $request->file('avatar')->isValid()) {
            // Nếu có thì thục hiện lưu trữ file vào public/avatar
            $image = $request->file('avatar');
            $extension = $request->avatar->extension();
            $fileName = 'avatar_' . time() . '.' . $extension;
            $avatarPath = $image->move('avatar', $fileName);
        }
        $dataInsert = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => hash::make($request->password),
            'status' =>$request->status,
            'avatar' =>$avatarPath,
            'role_id' => $request->role_id,
        ];
        // dd($dataInsert);
        DB::beginTransaction();
        try {
            User::create($dataInsert);
            DB::commit();
            // success
            return redirect()->route('admin.user.index')->with('success', 'Insert successful!');
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
        $roles = Role::pluck('name','id')->toArray();
        $user = User::findOrFail($id);
        $data['user'] = $user;
        $data['roles'] = $roles;
        return view('admin.users.edit', $data);
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
        $user = User::find($id);
        $avatarOld = $user->avatar;

        // update data for table user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = hash::make($request->password);
        $user->status = $request->status;
        $user->role_id = $request->role_id;

        $avatarPath = null;
        if ($request->hasFile('avatar') 
            && $request->file('avatar')->isValid()) {
            // Nếu có thì thục hiện lưu trữ file vào public/avatar
            $image = $request->file('avatar');
            $extension = $request->avatar->extension();
            $fileName = 'avatar_' . time() . '.' . $extension;
            $avatarPath = $image->move('avatar', $fileName);
            $user->avatar = $avatarPath;
            Log::info('avatarPath: ' . $avatarPath);
        }

        DB::beginTransaction();

        try {
            // update data for table posts
            $user->save();
            
            DB::commit();

            if (File::exists(public_path($avatarOld))) {
                File::delete(public_path($avatarOld));
            }

            // success
            return redirect()->route('admin.user.index')->with('success', 'Update successful!');
        } catch (\Exception $ex) {
            DB::rollback();
            // dd($ex->getMessage());
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
        DB::beginTransaction();

        try {
            $user = User::find($id);
            $user->delete();

            DB::commit();

            return redirect()->route('admin.user.index')
                ->with('success', 'Delete User successful!');
        }  catch (\Exception $ex) {
            DB::rollBack();
            // have error so will show error message
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
