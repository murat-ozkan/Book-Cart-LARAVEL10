<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //? DB facade'sini kullanmak; daha esnek deniliyor.
        // $books = DB::table('books')->get(); 

        //? Query builders kullanmak.
        // $books = DB::table('books')
        //     ->where('category_id', 1)
        //     ->get();

        //? Model üzerinden çağırmak daha yaygın. Modeller, veritabanı tablolarını temsil eden Laravel sınıflarıdır.
        $books = Book::get(); // SQL sorgusu olsaydı; select * from books
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->price = $request->price;
        $book->save();
        //! class yöntemi kullandık. Eloquent ORM Model yeni veri ekleme.

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);
        $book->name = $request->name;
        $book->price = $request->price;
        $book->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
