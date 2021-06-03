<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerRecord extends Model
{
    use HasFactory;
    protected $table = 'worker_record';
    protected $fillable = [
        'worker_id' , 'record_id'
    ];

    

}
