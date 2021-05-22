<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next , $permission)
    {   

        // lấy role của user khi đăng nhập vào hệ thống
        $roleOfUser = DB::table('users')
            ->join('roles', 'users.role_id', '=' , 'roles.id')
            ->where('users.id', auth()->id())
            ->select('roles.*')
            ->get()->pluck('id')->toArray();

        // dd($roleOfUser);

        // lấy các permission thuộc role của user khi đăng nhập vào hệ thống

        $roleOfUser =  DB::table('roles')
            ->join('permission_role', 'roles.id', '=', 'permission_role.role_id')
            ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
            ->whereIn('roles.id', $roleOfUser)
            ->select('permissions.*')
            ->get()->pluck('id')->unique(); 

        // dd($roleOfUser);

        // lấy ra màng hình tương ứng để check phân quyền

        $checkPermission = Permission::where('name', $permission)->value('id');
        
        // kiểm tra xem user có được phép vào màng hình hay kh

        if ($roleOfUser->contains($checkPermission)) {
            return $next($request);
        }

        return abort(401);

        
    }
}
