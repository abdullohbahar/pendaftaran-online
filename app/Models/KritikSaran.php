<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KritikSaran extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'kritik_saran';

    protected $fillable = [
        'nama',
        'email',
        'no_telepon',
        'kritik_saran',
        'tingkat_kepuasan'
    ];
}
