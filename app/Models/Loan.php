<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kode_peminjaman',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status'
    ];
    protected $casts = [
        'tanggal_pinjam' => 'date:d-m-Y',
        'tanggal_kembali' => 'datetime:d-m-Y',
    ];

    /**
     * Get the user that owns the Loan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the book that owns the Loan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function book(): BelongsTo
    // {
    //     return $this->belongsTo(Book::class);
    // }

    /**
     * The books that belong to the Loan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }

    // public function name(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($value) => strtoupper($value),
    //         set: fn ($value) => $value,
    //     );
    // }
}
