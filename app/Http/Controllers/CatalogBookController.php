<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\CategoryBook;
use Illuminate\Http\Request;

class CatalogBookController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function catalog(Request $request)
    {
        // return $request->catbook;
        return inertia('CatalogBook', [
            'categories'    => CategoryBook::get(),
            'books'         => Book::with('category_book')
                ->paginate(12)
        ]);
    }
    public function category($slug)
    {
        $categoty = CategoryBook::whereSlug($slug)->first();
        return inertia('CatalogBook', [
            'categories'    => CategoryBook::get(),
            'books'         => Book::with('category_book')
                ->where('category_id', $categoty->id)
                ->paginate(12)
        ]);
    }
}
