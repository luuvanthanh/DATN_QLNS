<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'number_of_member',
        'start_day',
        'expected_end_day',
        'actual_end_day',
        'status',
    ];
}
