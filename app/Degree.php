<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{

    protected $guarded = [];
    public $timestamps = true;

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
