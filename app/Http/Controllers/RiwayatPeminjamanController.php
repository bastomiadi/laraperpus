<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatPeminjamanController extends Controller
{
    public function book()
    {
        return inertia('Book', [
            'books' => Book::with('category_book')
                ->latest('category_id')
                ->paginate(7)
        ]);
    }

    public function create()
    {
        if (!Auth::check() || !Auth::user()->status) {
            abort(404);
        }
        return inertia('Pinjam', [
            "books" => Book::whereStatus(1)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'book'  => 'required',
            'tanggal_peminjaman'    => 'required|date',
            'tanggal_kembali'   => 'required|date'
        ]);

        $loan = Loan::create([
            'user_id'           => Auth::id(),
            'kode_peminjaman'   => mt_rand(10000, 999999) . mt_rand(100, 999),
            'tanggal_pinjam'    => $request->tanggal_peminjaman,
            'tanggal_kembali'   => $request->tanggal_kembali,
        ]);
        $loan->books()->attach($request->book);
        Book::whereIn('id', $request->book)
            ->update([
                "status"    => 0
            ]);
        return redirect()
            ->route('history')
            ->with('success', 'Silahkan menunggu konfirmasi dari admin');
    }

    public function history(Request $request)
    {
        return inertia('History', [
            'loans' =>  Loan::with('books')->whereUserId(Auth::id())
                ->when(
                    $request->search,
                    function ($query, $search) {
                        return $query->where('kode_peminjaman', 'LIKE', '%' . $search . '%');
                    },
                )
                ->paginate(7)
        ]);
    }
}
