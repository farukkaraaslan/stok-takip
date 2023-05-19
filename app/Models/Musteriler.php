<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musteriler extends Model
{
    use HasFactory;
    protected $fillable = [
        'tc_no',
        'adi',
        'soyadi',
        'fatura_no'

    ];
}
