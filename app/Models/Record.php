<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    protected $table = 'records';

    public function record(){
        return $this->belongsToMany(Worker::class, 'worker_record', 'id' , 'id');
    }
    
}
