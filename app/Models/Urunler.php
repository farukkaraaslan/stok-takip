<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urunler extends Model
{
    use HasFactory;
    protected $fillable = [
        'adi',
        'adet',
        'fiyat',
        'kategori_id'
    ];
    function getCategory()
    {
        return $this->hasOne(Kategoriler::class, 'id', 'kategori_id');
    }
}
