<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $table = 'contracts';

    protected $fillable = [
        'start_day',
        'end_day',
        'wage',
        'status',
        'contract_type_id',
    ];

    public function contractWorkers(){
        return $this->hasMany(ContractWorker::class);
    }
}
