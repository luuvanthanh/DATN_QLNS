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
            ['name' => 'user-list',
             'display_name' => 'Xem danh sách người dùng'],
            ['name' => 'user-add',
             'display_name' => 'thêm người dùng'],
            ['name' => 'user-edit',
             'display_name' => 'Chỉnh sửa người dùng'],
            ['name' => 'user-delete',
             'display_name' => 'xóa người dùng'],
        ];
        DB::table('permissions')->insert($dataInsert);
    }
}
