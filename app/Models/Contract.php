<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $table = 'contracts';

    protected $fillable = [
        'code',
        'start_day',
        'end_day',
        'wage',
        'status',
        'contract_type_id',
    ];

    public function contractWorkers(){
        return $this->hasMany(ContractWorker::class);
    }
    public function contractType(){
        return $this->belongsTo(ContractType::class);
    }
    public function worker(){
        return $this->belongsToMany(Record::class, 'contract_worker', 'worker_id', 'contract_id');
    }
}
