<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable
{
    use HasTranslations, SoftDeletes;

    public $translatable = ['name'];

    protected $guarded = [];

    public function gender()
    {
        return $this->belongsTo('App\Gender', 'gender_id');
    }


    public function grade()
    {
        return $this->belongsTo('App\Grade', 'Grade_id');
    }



    public function classroom()
    {
        return $this->belongsTo('App\Classroom', 'Classroom_id');
    }

    public function Nationality()
    {
        return $this->belongsTo('App\Nationalitie', 'nationalitie_id');
    }


    public function section()
    {
        return $this->belongsTo('App\Section', 'section_id');
    }

    public function myparent()
    {
        return $this->belongsTo('App\My_Parent', 'parent_id');
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function student_account()
    {
        return $this->hasMany('App\StudentAccount', 'student_id');
    }
    // علاقة بين جدول الطلاب وجدول الحضور والغياب
    public function attendance()
    {
        return $this->hasMany('App\Attendance', 'student_id');
    }
}
