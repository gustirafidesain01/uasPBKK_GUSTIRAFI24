<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model 
{
    use HasFactory;
    protected $table = 'sewa'; 

    protected $fillable = [
        'nama_sewa', 
    ];

    public function dataTambahanKwitansi()
    {
        return $this->hasMany(Kwitansi::class, 'id_jadwal');
    }
}
