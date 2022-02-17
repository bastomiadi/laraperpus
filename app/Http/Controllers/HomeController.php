<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        // return Book::with('category_book')->get();
        return inertia('Home', [
            'books' => Book::with('category_book')
                ->latest()
                ->take(3)
                ->get()
        ]);
    }
}
