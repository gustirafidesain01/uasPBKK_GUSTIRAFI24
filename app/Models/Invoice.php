<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_penyewa',
        'id_sewa',
        'id_kwitansi',
    ];

    public function penyewa()
    {
        return $this->belongsTo(Penyewa::class, 'id_penyewa');
    }

 

    public function kwitansi()
    {
        return $this->belongsTo(Kwitansi::class, 'id_kwitansi');
    }
}