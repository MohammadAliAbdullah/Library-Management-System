<?php

namespace App\Http\Controllers\admin;

use App\Library;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dep = Department::pluck('departmentName', 'id');
        //$students = student::latest()->paginate(10);
        $library = Library:: paginate(10);

        return view('libraries.index')
        ->with('libries', $library);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libraries.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $library = new Library();
        $library->name = $request->name;
        $library->description = $request->description;
        $library->establish = $request->establish;
        $library->website = $request->website;
        $library->save();
        // dd($department);
        if ($library->id) {
            return response()->json(['success' => true, 'message' => 'Library Created!!'], 200);

        // return Response::json(['success' => true, 'message' => 'Library Created!!']);
        } else {
            return Response::json(['success' => false, 'message' => 'Error!!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Library $library
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Library $library)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Library $library
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Library $library)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Library             $library
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Library $library)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Library $library
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $library)
    {
        $lib = Library::findOrFail($library->id);
        $lib->delete();

        return response()->json(['success' => true, 'message' => 'Listing Deleted']);
    }
}
