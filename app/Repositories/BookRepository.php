<?php

namespace App\Repositories;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookRepository
{
    public function getAll(Request $request)
    {
        $books = DB::table('books')
            ->leftJoin('category_books', 'books.category_id', '=', 'category_books.id')
            ->select('books.*', 'category_books.nama')
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
            ->paginate(5);

        return $books;
    }

    public function storeAll($request)
    {
        // Book::create([
        //     'category_id'   => $request->category,
        //     'judul'     => $request->judul,
        //     'penerbit'  => $request->penerbit,
        //     'editor'   => $request->penulis,
        //     'tanggal_terbit'  => $request->tanggal_terbit,
        //     'cover'          => $request->image ? $request->file('image')->store('image') : null
        // ]);

        $book = new Book();
        $book->category_id      = $request->category;
        $book->judul            = $request->judul;
        $book->penerbit         = $request->penerbit;
        $book->editor           = $request->penulis;
        $book->tanggal_terbit   = $request->tanggal_terbit;
        $book->cover            = $request->image ? $request->file('image')->store('image') : null;
        return $book->save();
    }

    public function updateAll($request, $book)
    {
        if ($request->image) {
            Storage::delete($book->cover);
            $image = $request->file('image')->store('image');
        } elseif ($book->cover) {
            $image = $book->cover;
        } else {
            $image = null;
        }

        $book->category_id      = $request->category;
        $book->judul            = $request->judul;
        $book->penerbit         = $request->penerbit;
        $book->editor           = $request->penulis;
        $book->tanggal_terbit   = $request->tanggal_terbit;
        $book->cover            = $image;
        return $book->save();
    }
}
