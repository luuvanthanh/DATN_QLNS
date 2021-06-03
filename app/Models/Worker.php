<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $table = 'workers';
    // protected $dates = ['day_work'];

    protected $fillable = [ 
        'code',
        'name',
        'sex',
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
        'department_id',
        'position_id',
        'salary_id',
    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function position(){
        return $this->belongsTo(Position::class);
    }

    
    public function record(){
        return $this->belongsToMany(Record::class, 'worker_record', 'id' , 'id');
    }

    
    
}
