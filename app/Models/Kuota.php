<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuota extends Model
{
    use HasFactory;

    protected $table = 'kuota';

    protected $fillable = [
        'tanggal',
        'kuota',
        'tersedia'
    ];
}