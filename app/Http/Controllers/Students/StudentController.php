<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentsRequest;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    protected $student;

    public function __construct(StudentRepository $student)
    {
        $this->student = $student;
    }

    public function index()
    {
        return $this->student->get_students();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->student->Create_Student();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentsRequest $request)
    {
        return  $this->student->Store_Student($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->student->Show_Student($id);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->student->Edit_Student($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStudentsRequest $request)
    {

        return $this->student->Update_Student($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->student->Delete_Student($id);
    }

    public function Get_classrooms($id)
    {

        return $this->student->Get_classrooms($id);
    }
    public function Get_Sections($id)
    {

        return $this->student->Get_Sections($id);
    }
}
