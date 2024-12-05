<?php

namespace App\Repositories;

use App\Traits\AttachFilesTrait;
use App\Library;
use App\Grade;

class LibraryRepository implements LibraryRepositoryInterface
{

    use AttachFilesTrait;


    public function index()
    {
        $books = Library::all();
        return view('pages.library.index', compact('books'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('pages.library.create', compact('grades'));
    }

    public function store($request)
    {

        try {
            // Create a new Library instance
            $books = new Library();
            $books->title = $request->title;
            $books->file_name = $request->file('file_name')->getClientOriginalName();
            $file = $request->file('file_name');
            $books->Grade_id = $request->Grade_id;
            $books->classroom_id = $request->Classroom_id;
            $books->section_id = $request->section_id;
            $books->teacher_id = 1;
            $books->save();


            $this->uploadFile($file, $books->file_name, 'library/' . $books->id);

            toastr()->success(trans('messages.success'));
            return redirect()->route('library.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        $grades = Grade::all();
        $book = library::findorFail($id);
        return view('pages.library.edit', compact('book', 'grades'));
    }

    public function update($request)
    {
        // return $request;

        try {

            $book = library::findorFail($request->id);



            if ($request->hasfile('file_name')) {

                $this->deleteFile($book->id, $book->file_name);

                $book->file_name = $request->file('file_name')->getClientOriginalName();
                $file = $request->file('file_name');
                $this->uploadFile($file, $book->file_name, 'library/' . $book->id);
            }

            $book->title = $request->title;
            $book->Grade_id = $request->Grade_id;
            $book->classroom_id = $request->Classroom_id;
            $book->section_id = $request->section_id;
            $book->teacher_id = 1;
            $book->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('library.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request) {
        $this->deleteFile( $request->id,$request->file_name);
        library::destroy($request->id);
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('library.index');
    }

    public function download($request)
    {
        return response()->download(public_path('attachments/library/' . $request->book_id . '/'  . $request->file_name));
    }
}
