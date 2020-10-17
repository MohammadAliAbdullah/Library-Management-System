<?php

namespace App\Http\Controllers\admin;

use App\IssueBook;
use App\Student;
use App\Department;
use App\Author;
use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IssueBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo 'library management admin dashboard';
        $dep = Department::pluck('departmentName', 'id');
        $book = Book::pluck('StudentName', 'id');
        $aut = Author::pluck('authorname', 'id');
        // $students = student::paginate(5);
        $issues = IssueBook::paginate(10);
        // dd($student);

        return view('issue_book.index')
        // ->with('students', $students)
        ->with('issues', $issues)
        ->with('dep', $dep)
        ->with('book', $book)
        ->with('aut', $aut);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('issue_book.index');
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
        // dd($request);
        $issue = new IssueBook();
        $issue->studentName = $request->name;
        $issue->registerNo = $request->registration;
        $issue->department_id = $request->department;
        $issue->book_id = $request->book;
        $issue->author_id = $request->author;
        $issue->phoneNo = $request->phone;
        $issue->returnBook = $request->return;
        $issue->save();
        if ($issue->id) {
            return response()->json(['success' => true, 'message' => 'Issue New Book !!'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Issue Fails !!'], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\IssueBook $issueBook
     *
     * @return \Illuminate\Http\Response
     */
    public function show(IssueBook $issueBook)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\IssueBook $issueBook
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(IssueBook $issueBook)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\IssueBook           $issueBook
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IssueBook $issueBook)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\IssueBook $issueBook
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stu = IssueBook::findOrFail($id);
        $stu->delete();

        return response()->json(['success' => true, 'message' => 'Listing Deleted']);

        // if (IssueBook::destroy($issueBook->id)) {
        // if (IssueBook::destroy($id)) {
        //     // return responese()->json(['message' => 'deleted issue book']);

        //     return response()->json(['success' => true, 'message' => 'Listing Deleted']);
        // } else {
        //     return response()->json(['success' => false, 'message' => 'Deleted Fail']);
        // }
    }
}
