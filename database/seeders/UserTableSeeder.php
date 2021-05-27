<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [   
                'name' => 'superadministrator',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345'),
                'status' => 1,
                'avatar' => 'sang',
                'role_id' => 1,
            ],
            [   
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('12345'),
                'status' => 1,
                'avatar' => 'sang',
                'role_id' => 2,
            ],
        ];
        DB::table('users')->insert($data);

    }
}
