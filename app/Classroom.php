<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Grade;
class Classroom extends Model 
{
    use HasTranslations;

    public $translatable = ['Name'];

    protected $fillable = [
        'Name',
        'grade_id',
    ];

    protected $table = 'Classrooms';
    public $timestamps = true;

    public function Grade()
    {
        return $this->belongsTo(Grade::class);}

}