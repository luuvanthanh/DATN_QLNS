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
             'display_name' => 'Xem vai trò người dùng'],
            ['name' => 'user-add',
             'display_name' => 'Thêm vai trò người dùng'],
            ['name' => 'user-edit',
             'display_name' => 'Chỉnh sửa vai trò người dùng'],
            ['name' => 'user-delete',
             'display_name' => 'Xóa vai trò người dùng'],
        ];
        DB::table('permissions')->insert($dataInsert);
    }
}
