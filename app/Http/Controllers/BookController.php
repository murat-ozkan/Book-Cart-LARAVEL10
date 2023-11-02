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
        //v1 $books = Book::where('is_deleted', 0)->get(); // SQL sorgusu olsaydı; select * from books
        $books = Book::NotDeleted()->get();
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
        //v1 $book = Book::findOrFail($id);
        $book = Book::NotDeleted()->findOrFail($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //v1 $book = Book::findOrFail($id);
        $book = Book::NotDeleted()->findOrFail($id);
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
        $book = Book::findOrFail($id);
        $book->is_deleted = 1; //? veya ->update(['is_deleted' => 0])
        $book->save();

        return redirect()->back();
    }
    //v1 {
    //     Book::findOrFail($id)->delete();
    //     return redirect()->back();
    // }
}
