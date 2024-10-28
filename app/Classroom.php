<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model 
{

    protected $table = 'Classrooms';
    public $timestamps = true;

    public function Grade()
    {
        return $this->belongsTo('Grade', 'grade_id');
    }

}