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
                'name' => 'Administrator',
                'email' => 'administrator@gmail.com',
                'password' => bcrypt('12345'),
                'status' => 1,
                'avatar' => 'sang',
                'role_id' => 1,
            ],
            [   
                'name' => 'SaleMan',
                'email' => 'saleMan@gmail.com',
                'password' => bcrypt('12345'),
                'status' => 1,
                'avatar' => 'sang',
                'role_id' => 2,
            ],
            [   
                'name' => 'SaleManage',
                'email' => 'saleManage@gmail.com',
                'password' => bcrypt('12345'),
                'status' => 1,
                'avatar' => 'sang',
                'role_id' => 3,
            ],

        ];
        DB::table('users')->insert($data);

    }
}
