<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;

    protected $fillable = [
        'penyewa_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'total_pembayaran',
    ];

    public function penyewa()
    {
        return $this->belongsTo(Penyewa::class);
    }
}
