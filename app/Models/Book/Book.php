<?php

namespace App\Models\Book;

use App\Models\Indexes\Index;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'books';

    public $timestamps = true;

    /**
     * @return BelongsTo;
     */
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'publisher_id');
    }

    /**
     * @return HasMany;
     */
    public function bookIndex(): HasMany
    {
        return $this->hasMany(Index::class, 'book_id')->whereNull('parent_id');
    }
}
