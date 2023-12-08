<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regulasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_dokumen',
        'tahun_terbit',
        'jenis',
        'file',
    ];

    public $timestamps = false;
}
