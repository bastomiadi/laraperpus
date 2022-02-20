<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoanRequest;
use App\Models\{Book, User};
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return inertia('Loans/Index', [
            'loans'    => Loan::with(['books', 'user'])
                ->when(
                    $request->search,
                    function ($query, $search) {
                        return $query->where('kode_peminjaman', 'LIKE', '%' . $search . '%');
                    },
                    function ($query) {
                        return $query->latest('user_id');
                    }
                )
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
        return inertia('Loans/Create', [
            'books' => Book::whereStatus(1)->get(),
            'students'    => User::whereRole('Mahasiswa')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoanRequest $request)
    {
        $book = Book::findOrFail($request->book);
        Loan::create([
            'user_id'    => $request->mahasiswa,
            'book_id'    => $request->book,
            'kode_peminjaman'         => mt_rand(10000, 999999) . mt_rand(100, 999),
            'tanggal_pinjam' => $request->tanggal_peminjaman,
            'tanggal_kembali'    => $request->tanggal_pengembalian,
            'status' => 1
        ]);

        $book->status = 0;
        $book->save();

        return redirect()
            ->route('loan.index')
            ->with('success', 'Loan Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        return inertia('Loans/Edit', [
            'loan'  => $loan->load(['user', 'books'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        $loan->status = $request->status;
        $loan->save();
        $booksId = $loan->load('books');
        foreach ($booksId->books as $bki) {
            $bkki = $bki->pivot->book_id;
            Book::where('id', $bkki)
                ->update([
                    "status"    => $request->status
                ]);
        }
        return redirect()
            ->route('loan.index')
            ->with('success', 'Loan Confirm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
