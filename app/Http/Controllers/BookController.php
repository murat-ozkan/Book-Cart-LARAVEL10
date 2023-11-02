<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
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

    public function add()
    {
        return view('books.add');
    }

    public function store(Request $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->price = $request->price;
        $book->save();
        //! class yöntemi kullandık. Eloquent ORM Model yeni veri ekleme.

        return redirect()->back();
    }
}
