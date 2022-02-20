<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\CategoryBook;
use App\Repositories\BookRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    private $bookRepository;
    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }
    public function index(Request $request)
    {
        return inertia('Books/Index', [
            'books' => $this->bookRepository->getAll($request)
        ]);
    }

    public function create()
    {
        return inertia('Books/Create', [
            'categories'    => CategoryBook::oldest('nama')->get()
        ]);
    }

    public function store(BookRequest $request)
    {
        $this->bookRepository->storeAll($request);
        return redirect()
            ->route('book.index')
            ->with('success', 'Book Created');
    }

    public function show(Book $book)
    {
        abort(404);
    }

    public function edit(Book $book)
    {
        return inertia('Books/Edit', [
            'book'  => $book,
            'categories'    => CategoryBook::oldest('nama')->get()
        ]);
    }

    public function update(BookRequest $request, Book $book)
    {
        $this->bookRepository->updateAll($request, $book);
        return redirect()
            ->route('book.index')
            ->with('success', 'Book Updated');
    }

    public function destroy(Book $book)
    {
        abort(404);
    }
}
