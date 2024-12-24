<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;


class My_Parent extends Authenticatable
{
    use HasTranslations;
    protected $table = 'my__parents';

    public $translatable = ['Name_Father', 'Job_Father', 'Name_Mother', 'Job_Mother'];

    protected $guarded = [];
}
