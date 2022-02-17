<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\CategoryBook;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return inertia('Books/Index', [
            'books'    => Book::with('category_book')
                ->when(
                    $request->search,
                    function ($query, $search) {
                        return $query->where('judul', 'LIKE', '%' . $search . '%');
                    },
                    function ($query) {
                        return $query->latest('category_id');
                    }
                )
                ->when($request->search, function ($query, $search) {
                    return $query->orWhere('penerbit', 'LIKE', '%' . $search . '%');
                })
                ->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Books/Create', [
            'categories'    => CategoryBook::oldest('nama')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        Book::create([
            'category_id'   => $request->category,
            'judul'     => $request->judul,
            'penerbit'  => $request->penerbit,
            'editor'   => $request->penulis,
            'tanggal_terbit'  => $request->tanggal_terbit
        ]);
        return redirect()
            ->route('book.index')
            ->with('success', 'Book Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return inertia('Books/Edit', [
            'book'  => $book,
            'categories'    => CategoryBook::oldest('nama')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        $book->update([
            'category_id'   => $request->category,
            'judul'     => $request->judul,
            'penerbit'  => $request->penerbit,
            'editor'   => $request->penulis,
            'tanggal_terbit'  => $request->tanggal_terbit
        ]);
        return redirect()
            ->route('book.index')
            ->with('success', 'Book Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
