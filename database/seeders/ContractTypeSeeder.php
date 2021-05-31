<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractTypeSeeder extends Seeder
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
               'name' => 'Không xác định thời gian',
               'slug' => 'khong_xac_dinh_thoi_gian'
           ],
           [
            'name' => 'Xác định thời gian',
            'slug' => 'xac_dinh_thoi_gian'
            ],
            [
                'name' => 'Nghỉ việc',
                'slug' => 'nghi_viec'
            ],
        ];
        DB::table('contract_types')->insert($data);
    }
}
