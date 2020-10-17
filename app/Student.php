<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
            'name',
            'department_id',
            'registerNo',
            'rollNo',
            'phoneNo',
        ];
    
 public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
