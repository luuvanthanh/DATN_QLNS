<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkerSeeder extends Seeder
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
                'code' => 'NV01',
                'name' => 'Lưu Văn Thanh',
                'status' => 0,
                'birthday' => '1999-01-29',
                'cmnd_no' => '012345678',
                'address' => 'Đà Nẵng',
                'phone' => '0396859445',
                'email' => 'thanh12@gmail.com',
                'level' => 'Cao đẳng',
                'certificate' => 'english',
                'school' => 'SPKT',
                'skill' => 'a',
                'status' => 1,
                'department_id' => 1
            ],
            [
                'code' => 'NV02',
                'name' => 'Đỗ Văn Sang',
                'status' => 0,
                'birthday' => '1999-01-29',
                'cmnd_no' => '012345678',
                'address' => 'Đà Nẵng',
                'phone' => '0396859445',
                'email' => 'sang12@gmail.com',
                'level' => 'Cao đẳng',
                'certificate' => 'english',
                'school' => 'SPKT',
                'skill' => 'a',
                'status' => 1,
                'department_id' => 1
            ],
            [
                'code' => 'NV03',
                'name' => 'Nguyễn Văn Tài',
                'status' => 0,
                'birthday' => '1999-01-29',
                'cmnd_no' => '012345678',
                'address' => 'Đà Nẵng',
                'phone' => '0396859445',
                'email' => 'tai12@gmail.com',
                'level' => 'Cao đẳng',
                'certificate' => 'english',
                'school' => 'SPKT',
                'skill' => 'a',
                'status' => 1,
                'department_id' => 2
            ],
        ];
        DB::table('workers')->insert($data);
    }
}
