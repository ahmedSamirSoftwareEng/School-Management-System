<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\Section;

class AjaxController extends Controller
{
    public function getClassrooms($id)
    {
        return Classroom::where("Grade_id", $id)->pluck("Name", "id");
    }
    //Get Sections
    public function Get_Sections($id)
    {
        return Section::where("Class_id", $id)->pluck("Name_Section", "id");
    }
}
