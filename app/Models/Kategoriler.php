<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriler extends Model
{
    use HasFactory;
    protected $fillable = [
        'adi',
    ];

    public function productCount()
    {
        return $this->hasMany('App\Models\Urunler', 'kategori_id', 'id')->count();
    }
    public function urunler()
    {
        return $this->hasMany(Urunler::class, 'kategori_id');
    }
}
