<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Grade;
use App\Classroom;
use App\Http\Requests\StoreGrade;



class GradeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $grades = Grade::all();
    return view('pages.grades.index', compact('grades'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create() {}

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreGrade $request)
  {
    if (Grade::where('Name->ar', $request->Name)->orWhere('Name->en', $request->Name_en)->exists()) {

      return redirect()->back()->withErrors(trans('Grades.exists'));
    }

    try {
      $validated = $request->validated();

      $grade = new Grade();
      $grade->Name = [
        'en' => $request->Name_en,
        'ar' => $request->Name
      ];
      $grade->Notes = $request->Notes;
      $grade->save();

      toastr()->success('messages.success');
      return redirect()->route('grades.index');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id) {}

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id) {}

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id, StoreGrade $request)
  {

    try {
      $validated = $request->validated();

      $grade = Grade::findOrFail($id);
      $grade->Name = [
        'en' => $request->Name_en,
        'ar' => $request->Name
      ];
      $grade->Notes = $request->Notes;
      $grade->save();

      toastr()->success('messages.Update');
      return redirect()->route('grades.index');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {


    try {
      $grade = Grade::findOrFail($id);


      $classrooms = Classroom::where('grade_id', $id)->pluck('grade_id');
      if (count($classrooms) > 0) {
        return redirect()->back()->withErrors(['error' => trans('Grades.delete_Grade_Error')]);
      }
      $grade->delete();
      toastr()->success('messages.Delete');
      return redirect()->route('grades.index');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }
}
