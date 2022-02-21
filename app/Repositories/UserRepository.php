<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function getAll($request)
    {
        $users = DB::table('users')
            // ->leftJoin('category_books', 'books.category_id', '=', 'category_books.id')
            // ->select('books.*', 'category_books.nama')
            ->whereRole('Mahasiswa')
            ->when(
                $request->search,
                function ($query, $search) {
                    return $query->where('name', 'LIKE', '%' . $search . '%');
                }
                // function ($query) {
                //     return $query->latest('category_id');
                // }
            )
            ->paginate(5);

        return $users;
    }
}
