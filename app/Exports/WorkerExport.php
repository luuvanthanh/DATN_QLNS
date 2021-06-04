<?php

namespace App\Exports;

use App\Models\Worker;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WorkerExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Worker::select('CODE',
        'Name',
        'birthday',
        'cmnd_no',
        'day_range',
        'issued_by',
        'address',
        'phone',
        'day_work',
        'email',
        'level',
        'certificate',
        'school',
        'skill',
        'status',
        'department_id')->get();
    }
    public function headings(): array {
        return [
            'Mã nhân viên',
            'Tên nhân viên',
            'Ngày sinh',
            'CMMD',
            'Ngày cấp',
            'Nơi cấp',
            'Địa chỉ',
            'Số điện thoại',
            'Ngày vào làm',
            'email',
            'Trình độ',
            'Bằng cấp',
            'Trường',
            'Kĩ năng',
            'Trạng thái',
            'Mã phòng ban',
        ];
    }
}
