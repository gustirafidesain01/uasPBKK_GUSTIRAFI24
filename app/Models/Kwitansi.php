<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kwitansi extends Model
{
    use HasFactory;
    protected $table = 'kwitansi';

    protected $fillable = [
        'nomor_kwitansi',
        'tanggal',
        'jumlah'
    ];

    public function penyewa()
    {
        return $this->hasMany(Penyewa::class, 'kwitansi_id');
    }
}
