<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
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
                'name' => 'Phòng kinh doanh',
                'slug' => 'phong_kinh_doanh'
            ],
            [
                'name' => 'Phòng kế toán',
                'slug' => 'phong_ke_toan'
            ],
        ];
        DB::table('departments')->insert($data);
    }
}
