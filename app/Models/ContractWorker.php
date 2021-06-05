<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractWorker extends Model
{
    use HasFactory;
    protected $table = 'contract_worker';

    protected $fileable = [
        'worker_id',
        'contract_id',
    ];

    public function worker(){
        return $this->belongsTo(worker::class);
    }

    public function contract(){
        return $this->belongsTo(Contract::class);
    }
}
