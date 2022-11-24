<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates =['created_at'];

    public function pinjam()
    {
        return $this->hasOne(pinjam::class, 'buku_id', 'id');
    }
}
