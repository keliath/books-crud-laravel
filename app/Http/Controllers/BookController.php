<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use Illuminate\Http\Request;
use App\Models\Book;
use PhpParser\Node\Expr\FuncCall;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::paginate(5);

        return view('index', compact('books'));
    }

    public function create()
    {

        return view('create');
    }

    public function store(BookStoreRequest $request)
    {
        $image = $request->file('image')->store('public/product');

        Book::create([
            "name" => $request->name,
            "description" => $request->description,
            "category" => $request->category,
            "image" => $image
        ]);

        return back()->with('message', 'Nuevo Libro Anadido');
    }

    public function edit($id)
    {

        $book = Book::find($id);

        return view('edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        $book->name = $request->name;
        $book->description = $request->description;
        $book->category = $request->category;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('public/product');
            $book->image = $image;
        }
        $book->save();

        return redirect()->route('index')->with('message', 'Libro editado');
    }

    public function destroy($id)
    {

        $book = Book::find($id);
        $book->delete();

        return back()->with('message', 'libro borrado');
    }
}
