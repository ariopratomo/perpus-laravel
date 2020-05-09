<?php

namespace App\Http\Controllers\Frontend;

use App\Book;
use App\BorrowHistory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('title', 'ASC')->paginate(10);
        return view('frontend.book.index', [
            'books' => $books,
            'title' => 'Beranda Perpusku'
        ]);
    }

    public function show(Book $book)
    {
        return view('frontend.book.show', [
            'book' => $book,
            'title' =>  $book->title
        ]);
    }

    public function borrow(Book $book)
    {
        $user = auth()->user();

        if ($user->borrow()->isStillBorrow($book->id)) {
            return redirect()->back()->withToast('Kamu sedah meminjam buku : ' . $book->title);
        }

        $user->borrow()->attach($book);
        $book->decrement('qty');

        return redirect()->back()->withToast('Berhasil Meminjam Buku : ' . $book->title);
    }
}
