<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpustakaan extends Model
{
    protected $table = 'perpustakaans';

    protected $fillable = [
        'judul',
        'pengarang',
        'gambar',
    ];
}
