<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satis extends Model
{
    use HasFactory;
    protected $fillable = [
        'musteri_id',
        'urun_id',
        'fiyat',
        'adet',
    ];
    function getUrun()
    {
        return $this->hasOne(Urunler::class, 'id', 'urun_id');
    }
    function getMusteri()
    {
        return $this->hasOne(Musteriler::class, 'id', 'musteri_id');
    }
}
