<?php

namespace App\Repositories;

interface StudentRepositoryInterface
{
    public function get_students();


    public function Create_Student();

    public function Get_classrooms($id);

    public function Get_Sections($id);

    public function Store_Student($request);

    // Edit_Student
    public function Edit_Student($id);

    //Update_Student
    public function Update_Student($request);

    // Delete_Student

    public function Delete_Student($id);

    // show student
    public function show_student($id);
    
}
