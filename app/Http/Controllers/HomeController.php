<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $books = auth()->user()->borrow;
        return view('home', [
            'books' => $books
        ]);
    }
}
