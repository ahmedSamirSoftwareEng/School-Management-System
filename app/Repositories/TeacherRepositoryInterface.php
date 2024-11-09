<?php

namespace App\Repositories;

interface TeacherRepositoryInterface
{
    public function getAllTeachers();
    // Get specialization
    public function Getspecialization();

    // Get Gender
    public function GetGender();
    // StoreTeachers
    public function StoreTeachers($request);
}
