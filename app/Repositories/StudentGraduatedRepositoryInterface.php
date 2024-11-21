<?php


namespace App\Repositories;


interface StudentGraduatedRepositoryInterface
{

    public function index();

    public function create();



    public function SoftDelete($request);

    // ReturnData Students
    public function ReturnData($request);

    // destroy Students
    public function destroy($request);
}
