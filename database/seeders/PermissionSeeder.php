<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataInsert = [
            // permission user
            ['name' => 'user-list',
             'display_name' => 'Xem danh sách người dùng'],
            ['name' => 'user-add',
             'display_name' => 'Thêm người dùng'],
            ['name' => 'user-edit',
             'display_name' => 'Chỉnh sửa người dùng'],
            ['name' => 'user-delete',
             'display_name' => 'Xóa người dùng'],

            // permission role
            ['name' => 'role-list',
             'display_name' => 'Xem vai trò'],
            ['name' => 'role-add',
             'display_name' => 'Thêm vai trò'],
            ['name' => 'role-edit',
             'display_name' => 'Chỉnh sửa vai trò'],
            ['name' => 'role-delete',
             'display_name' => 'Xóa vai trò'],
            
            // permissiom department
            ['name' => 'department-list',
             'display_name' => 'Xem danh sách phòng ban'],
            ['name' => 'department-add',
             'display_name' => 'Thêm phòng ban'],
            ['name' => 'department-edit',
             'display_name' => 'Chỉnh sửa phòng ban'],
            ['name' => 'department-delete',
             'display_name' => 'Xóa phòng ban'],
            
            // permission worker
            ['name' => 'worker-list',
             'display_name' => 'Xem danh sách nhân viên'],
            ['name' => 'worker-add',
             'display_name' => 'Thêm nhân viên'],
            ['name' => 'worker-detail',
             'display_name' => 'Xem thông tin nhân viên'],
            ['name' => 'worker-edit',
             'display_name' => 'Chỉnh sửa nhân viên'],
            ['name' => 'worker-delete',
             'display_name' => 'Xóa nhân viên'],
            
            // permission worker
            ['name' => 'project-list',
             'display_name' => 'Xem danh sách dự án'],
            ['name' => 'project-add',
             'display_name' => 'Thêm dự án'],
            ['name' => 'project-detail',
             'display_name' => 'Chỉnh sửa dự án'],
            ['name' => 'project-delete',
             'display_name' => 'Xóa dự án'],
        ];
        DB::table('permissions')->insert($dataInsert);
    }
}
