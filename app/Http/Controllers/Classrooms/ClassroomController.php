<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Classroom;
use App\Grade;
use App\Http\Requests\StoreClassroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $My_Classes = Classroom::all();
    $Grades = Grade::all();
    return view('pages.classrooms.index', compact('My_Classes', 'Grades'));
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
  public function store(StoreClassroom $request)
  {
    // dd($request);

    try {
      $List_Classes = $request->List_Classes;

      foreach ($List_Classes as $List_Class) {

        $My_Classes  = new Classroom();

        $My_Classes->Name = [
          'en' => $List_Class['Name_en'],
          'ar' => $List_Class['Name'],
        ];

        $My_Classes->Grade_id = $List_Class['Grade_id'];

        $My_Classes->save();

        toastr()->success(trans('messages.success'));
      }
    } catch (\Exception $e) {

      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    return redirect()->route('Classrooms.index');
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
  public function update(Request $request)
  {
    // dd($request);

    try {

      $Classrooms = Classroom::findOrFail($request->id);

      $Classrooms->update([

        $Classrooms->Name = ['ar' => $request->Name, 'en' => $request->Name_en],
        $Classrooms->Grade_id = $request->Grade_id,
      ]);
      toastr()->success(trans('messages.Update'));
      return redirect()->route('Classrooms.index');
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
      $Classrooms = Classroom::findOrFail($id);
      $Classrooms->delete();
      toastr()->success(trans('messages.Delete'));
      return redirect()->route('Classrooms.index');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }
  public function delete_all(Request $request){
    // dd($request->all());
    $delete_all_id = explode(",",$request->delete_all_id);
    // dd($delete_all_id);
    $Classrooms = Classroom::whereIn('id', $delete_all_id)->delete();
    // dd($Classrooms);
    toastr()->success(trans('messages.Delete'));
    return redirect()->route('Classrooms.index');
  }
  public function Filter_Classes(Request $request){
    // dd($request->all());
    $My_Classes = Classroom::where('Grade_id', $request->Grade_id)->get();
    $Grades = Grade::all();
    return view('pages.classrooms.index', compact('My_Classes', 'Grades'));
  }
}
