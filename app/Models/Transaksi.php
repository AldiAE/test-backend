<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'jenis',
        'nama_kategori',
        'nominal',
        'deskripsi'
    ];

    protected $dates = ['deleted_at'];
}
