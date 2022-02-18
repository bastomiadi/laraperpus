<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatPeminjamanController extends Controller
{
    public function history(Request $request)
    {
        return inertia('History', [
            'loans' =>  Loan::with('book')
                ->whereUserId(Auth::id())
                ->when(
                    $request->search,
                    function ($query, $search) {
                        return $query->where('kode_peminjaman', 'LIKE', '%' . $search . '%');
                    }
                )
                ->paginate(7)
        ]);
    }
}
