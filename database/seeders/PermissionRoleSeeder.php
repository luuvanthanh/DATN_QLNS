<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = DB::table('permissions')->get();
        foreach ($permissions as $permission){
            $dataInsert = [
                'permission_id' => $permission->id,
                'role_id' => 1,
            ];
            DB::table('permission_role')->insert($dataInsert);
        }
    }
}
