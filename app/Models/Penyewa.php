<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'nama_penyewa', 
        'jenis_kelamin', 
        'alamat_penyewa', 
        'kwitansi_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kwitansi()
    {
        return $this->belongsTo(Kwitansi::class, 'kwitansi_id');
    }
}
