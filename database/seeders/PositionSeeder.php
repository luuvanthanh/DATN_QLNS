<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
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
                'name' => 'Nhân viên',
                'slug' => 'nhan_vien'
            ],
            [
                'name' => 'Quản lý',
                'slug' => 'Quan_ly'
            ],
        ];
        DB::table('positions')->insert($data);
    }
}
