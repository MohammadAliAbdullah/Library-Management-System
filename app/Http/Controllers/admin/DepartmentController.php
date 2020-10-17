<?php

namespace App\Http\Controllers\admin;

use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::latest()->paginate(10);
        // dd($departments);
        return view('department.index')->with('departments', $departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.index');
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
        // $admin = Auth::user();
        $department = new department();
        $department->departmentName = $request->departmentName;
        $department->save();
        // $admin->departments()->save($department);
        if ($department->id) {
            return response()->json(['success' => true, 'message' => 'Department Created!!'], 200);

        // return Response::json(['success' => true, 'message' => 'Department Created!!']);
        } else {
            return Response::json(['success' => false, 'message' => 'Error!!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Department $department
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Department $department
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
        $info = Department::find($id);

        return response()->json($info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Department          $department
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $where = [
            'id' => $department->id,
        ];
        //$info = Department::where($id)->get()->first();
        //-------only specipe id editable
        //$info = Department::find($id)->get()->first();
        //------any id editable
        $info = Department::where($where)->get()->first();
        $info->departmentName = $request->departmentName;

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
     * @param \App\Department $department
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        if (Department::destroy($department->id)) {
            return response()->json(['success' => true, 'message' => 'Listing Deleted']);
        } else {
            return response()->json(['success' => false, 'message' => 'Update Failed']);
        }
    }

    public function search(Request $request)
    {
        //return response()->json(['a'=>"b"]);
        
    
        $dep = DB::table('departments')
        ->whereRaw('(`departmentName` like "%'.$request->searchText.'%")')
        ->get();
        return response()->json($dep);
    }
}
