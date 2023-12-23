<?php

namespace App\Models\Indexes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Index extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'index';

    public $timestamps = true;
}
