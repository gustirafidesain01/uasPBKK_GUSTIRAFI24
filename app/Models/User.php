<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'level',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relationship with Invoice.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dataTambahanInvoice()
    {
        return $this->hasOne(Invoice::class, 'user_id')->orderBy('nidn', 'asc');
    }
    
    // relationship
    public function dataTambahanPenyewa(){
        return $this->hasOne(Penyewa::class,'user_id')->orderBy('nim','asc');
    }
}
