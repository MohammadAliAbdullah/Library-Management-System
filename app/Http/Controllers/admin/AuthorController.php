<?php

namespace App\Http\Controllers\admin;

use App\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Author::paginate(10);
        // dd($departments);
        return view('author.index')->with('departments', $departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.index');
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
        $department = new Author();
        $department->authorname = $request->authorname;
        $department->save();
        // $admin->departments()->save($department);
        if ($department->id) {
            return response()->json(['success' => true, 'message' => 'Author Created!!'], 200);

        // return Response::json(['success' => true, 'message' => 'Author Created!!']);
        } else {
            return Response::json(['success' => false, 'message' => 'Error!!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Author $author
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Author $author
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //     $where = [
        //     // 'writer_id'=>Auth::id(),
        //     'id' => $id,
        // ];
        //$info = Department::where($id)->get()->first();
        //-------only specipe id editable
        //$info = Department::find($id)->get()->first();
        //------any id editable
        $info = Author::find($id);

        return response()->json($info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Author              $author
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $where = [
            'id' => $author->id,
        ];
        //$info = Department::where($id)->get()->first();
        //-------only specipe id editable
        //$info = Department::find($id)->get()->first();
        //------any id editable
        $info = Author::where($where)->get()->first();
        $info->authorname = $request->authorname;

        // dd($department);

        if ($info->save()) {
            return response()->json(['success' => true, 'message' => 'Listing Updated']);
        } else {
            return response()->json(['success' => false, 'message' => 'Update Failed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Author $author
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if (author::destroy($author->id)) {
            return response()->json(['success' => true, 'message' => 'Listing Deleted']);
        } else {
            return response()->json(['success' => false, 'message' => 'Update Failed']);
        }
    }

    public function search(Request $request)
    {
        //return response()->json(['a'=>"b"]);

        $aut = DB::table('authors')
        ->whereRaw('(`authorname` like "%'.$request->searchText.'%")')
        ->get()->toArray();

        return response()->json($aut);
    }
}
