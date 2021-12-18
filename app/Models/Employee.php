<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'employee';
    protected $fillable = [
        'name',
        'salary',
        'dept_id',
        'hobbies',
        'gender'
    ];

    public function department(){
        return $this->belongsTo(Department::class,'dept_id','id');
    }
}
