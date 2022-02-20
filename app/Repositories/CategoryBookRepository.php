<?php

namespace App\Repositories;

use App\Models\{CategoryBook};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryBookRepository
{
    /**
     * Proses menampilkan data
     */
    public function getAll(Request $request)
    {
        $categori_books = DB::table('category_books')
            ->when($request->search, function ($query, $search) {
                $query->where('nama', 'LIKE', '%' . $search . '%');
            })->paginate(7);
        return $categori_books;
    }

    /**
     * Proses menyimpan data
     */
    public function storeAll($request)
    {
        $categoryBook = new CategoryBook();
        $categoryBook->nama  = $request->nama;
        $categoryBook->slug  = Str::slug($request->nama);
        $categoryBook->lokasi    = $request->lokasi;
        return $categoryBook->save();
    }

    /**
     * Proses update data
     */
    public function updateAll($request, $category)
    {
        $category->nama  = $request->nama;
        $category->lokasi = $request->lokasi;
        return $category->save();
    }
}
