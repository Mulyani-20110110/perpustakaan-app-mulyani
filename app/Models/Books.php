<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_book',
        'nama_author',
        'no_isbn',
        'tahun_terbit',
    ];
}
