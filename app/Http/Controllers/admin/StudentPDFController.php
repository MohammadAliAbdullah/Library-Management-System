<?php

namespace App\Http\Controllers\admin;

use App\Student;
// use PDF;
use App\Http\Controllers\Controller;

// use NahidulHasan\Html2pdf\Facades\Pdf;
use Barryvdh\DomPDF\Facade as PDF;

class StudentPDFController extends Controller
{
    public function index()
    {
        // $obj = new Pdf();
        // $document = $obj->generatePdf('<h1>Test</h1>');
        //-------------
        // $document = Pdf::generatePdf('<h1>Test</h1>');
        // return pdf :: download();
        //-------------
        $students = Student :: all();

        return view('student.pdf')->with('students', $students);
    }

    public function pdf()
    {
        //   $students = Student :: all();
      //   $document = pdf::generatePdf(view('student.index'))->with('students', $students);

      //   return pdf :: download();
        //----------------------------
            //   $students = Student :: all();
            //   $document = Pdf::generatePdf('student.pdf');
            //   return pdf :: download();
//----------------------------

        $data = Student::get();
        $pdf = PDF::loadView('student.pdf', $data);
       // $pdf = PDF::loadView('student.pdf', $data)->with('students', $data);
        $pdf->save(storage_path().'_filename.pdf');

        return $pdf->download('students.pdf');
    }
}
