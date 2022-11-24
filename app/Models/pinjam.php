<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjam extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(mahasiswa::class, 'user_id', 'id');
    }   

    public function buku()
    {
        return $this->belongsTo(buku::class, 'buku_id', 'id');
    }
}
