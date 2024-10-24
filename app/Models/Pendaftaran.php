<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftarans';

    // Kolom yang bisa diisi oleh user
    protected $fillable = [
        'nama',
        'email',
        'nomor_hp',
        'semester',
        'ipk',
        'beasiswa',
        'berkas',
        'status_ajuan',
    ];
}
