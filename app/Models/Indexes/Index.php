<?php

namespace App\Models\Indexes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Index extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'book_index';

    public $timestamps = true;

    /**
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(Self::class,'parent_id');
    }
}
