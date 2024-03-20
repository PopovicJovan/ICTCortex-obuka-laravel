<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(Request $request): object
    {
        $title = $request->input('title');

        $books = Book::when($title,
                            fn($query, $title) => $query->title($title))
                    ->get();
        return view('books.index', ['books' => $books]);
    }

    public function create()
    {

    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
