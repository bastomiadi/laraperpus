<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'judul',
        'penerbit',
        'editor',
        'tanggal_terbit',
        'cover',
        'status'
    ];

    /**
     * Get the category_book that owns the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category_book(): BelongsTo
    {
        return $this->belongsTo(CategoryBook::class, 'category_id');
    }
}
