<?php

namespace App\Http\Controllers\admin;

use App\Book;
use App\Student;
use App\Department;
use App\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo 'library management admin dashboard';
        //$students = student::all();
        $dep = Department::pluck('departmentName', 'id');
        // dd($dep);
        $aut = Author::pluck('authorname', 'id');
        // dd($aut);
        // $students = student::paginate(5);
        $books = Book::with('department', 'author')->paginate(10);

        // dd($students);

        return view('book.index')
        // ->with('students', $students)
        ->with('books', $books)
        ->with('dep', $dep)
        ->with('aut', $aut);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.index');
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
        //  dd($request);
        $book = new Book();
        $book->StudentName = $request->bookname;
        $book->department_id = $request->department_id;
        $book->author_id = $request->author_id;
        $book->price = $request->price;
        $book->save();
        // dd($book);
        // exit;
        if ($book->id) {
            return response()->json(['success' => true, 'message' => 'Book Created!!'], 200);

        // return Response::json(['success' => true, 'message' => 'Book Created!!']);
        } else {
            return Response::json(['success' => false, 'message' => 'Error!!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Book $book
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Book $book
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Book                $book
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Book $book
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        // dd($id);
        // exit;
        if (Book :: destroy($book->id)) {
            //return response()->json;
            return response()->json(['success' => true, 'message' => 'Listing Deleted']);
        } else {
            return response()->json(['success' => false, 'message' => 'Deleted Fail']);
        }
    }
}
