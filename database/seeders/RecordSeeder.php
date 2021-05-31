<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecordSeeder extends Seeder
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
                'name' => 'Sơ yếu lý lịch',
            ],
            [
                'name' => 'Chứng minh nhân dân',
            ],
            [
                'name' => 'Giấy khám sức khỏe',
            ],
            [
                'name' => 'Đơn xin việc',
            ],
            [
                'name' => 'Bằng cấp, chứng chỉ',
            ],
        ];
        DB::table('records')->insert($data);
    }
}
