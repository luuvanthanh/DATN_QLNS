<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'deparments';

    protected $fillable = [ 'name', 'slug'];

    public function workers(){
        return $this->hasMany(Worker::class);
    }
}
