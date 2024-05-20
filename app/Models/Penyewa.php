<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $fillable = [
        'invoice_id',
        'nama',
        'alamat',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
