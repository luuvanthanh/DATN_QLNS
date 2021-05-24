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
            ],
        ];
        DB::table('users')->insert($data);

    }
}
