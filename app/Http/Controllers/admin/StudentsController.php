<?php

namespace App\Http\Controllers\admin;

use App\Department;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Barryvdh\DomPDF\Facade as PDF;
// use NahidulHasan\Html2pdf\Facades\Pdf;
// use PDF;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dep = Department::pluck('departmentName', 'id');
        //$students = student::latest()->paginate(10);
        $students = Student::with('department')->paginate(10);

        return view('student.index')
        ->with('students', $students)
        ->with('alldep', $dep);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.index');
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
        $student = new Student();
        $student->name = $request->name;
        $student->department_id = $request->department_id;
        $student->registerNo = $request->registerNo;
        $student->rollNo = $request->rollNo;
        $student->phoneNo = $request->phoneNo;
        $student->save();
        // dd($department);
        if ($student->id) {
            return response()->json(['success' => true, 'message' => 'Student Created!!'], 200);

        // return Response::json(['success' => true, 'message' => 'Student Created!!']);
        } else {
            return Response::json(['success' => false, 'message' => 'Error!!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Students $students
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Students $students
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Department::find($id);

        return response()->json($info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Students            $students
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $students)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Students $students
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //1.-------------------work this method----------------
        // Student::find($id)->delete($id);
        // Student::findOrFail($id)->delete($id);

        // return response()->json(['success' => 'Student deleted successfully.']);
        //2.-------------------work this method----------------
        $stu = Student::findOrFail($id);
        $stu->delete();

        return response()->json(['success' => true, 'message' => 'Listing Deleted']);
        // return redirect('admin/student')->with('success', 'student is successfully deleted');
        //3.-------------------work this method----------------
        // if (Student::destroy($id)) {
        //     return response()->json(['success' => true, 'message' => 'Listing Deleted']);
        // } else {
        //     return response()->json(['success' => false, 'message' => 'Update Failed']);
        // }
    }

    public function search(Request $request)
    {
        alert('ab');
        $stud = DB::table('students')
        ->whereRaw('(`name` like "%'.$request->searchText.'%" or `department_id` like "%'.$request->searchText.'%" or `registerNo` like "%'.$request->searchText.'%" or `rollNo` like "%'.$request->searchText.'%" or `phoneNo` like "%'.$request->searchText.'%")')
        ->get();

        return response()->json($stud);
    }

    public function pdf()
    {
        // echo 'pdf file called';
        // exit;
        // $students = Student :: all();
        // $document = pdf::generatePdf(view('student.index'))->with('students', $students);

        // return pdf :: download($document);

        //-------------------

        //$data = Student::get();
       // $dep = Department::pluck('departmentName', 'id');
        $students = Student::with('department')->get();
        $pdf = PDF::loadView('student.pdf', ['students'=>$students]);
       // $pdf->save(storage_path().'_filename.pdf');

        return $pdf->download('student.pdf');
        //------------------
        // $pdf = PDF::loadView('student.index');
        // //If you specify a string in the stream method it will have the default name of the download if you click on the google tool
        // return $pdf->stream('student.pdf');
    }
}
