<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Musteriler;
use App\Models\Satis;
use App\Models\Urunler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SatisController extends Controller
{
    public function index()
    {
        $satislar = Satis::orderBy('created_at', 'DESC')->get();
        return view('admin/satis/liste', compact('satislar'));
    }
    public function create()
    {
        return view('admin/satis/olustur');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'musteri_id' => 'required|exists:musterilers,id',
            'urun_id' => 'required|exists:urunlers,id',
            'adet' => 'required|integer|min:1',
        ], [
            'musteri_id.required' => 'Müşteri ID alanı zorunludur.',
            'musteri_id.exists' => 'Geçerli bir müşteri seçilmelidir.',
            'urun_id.required' => 'Ürün ID alanı zorunludur.',
            'urun_id.exists' => 'Geçerli bir ürün seçilmelidir.',
            'adet.required' => 'Adet alanı zorunludur.',
            'adet.integer' => 'Adet alanı tam sayı olmalıdır.',
            'adet.min' => 'Adet en az 1 olmalıdır.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $musteri = Musteriler::find($request->musteri_id);
        $urun = Urunler::find($request->urun_id);

        if (!$musteri || !$urun) {
            return redirect()->back()->with('error', 'Müşteri veya ürün bulunamadı.')->withInput();
        }

        if ($urun->adet < $request->adet) {
            return redirect()->back()->with('error', 'Yeterli stok bulunmamaktadır.')->withInput();
        }

        $toplam_fiyat = $urun->fiyat * $request->adet;

        $satis = new Satis();
        $satis->musteri_id = $musteri->id;
        $satis->urun_id = $urun->id;
        $satis->adet = $request->adet;
        $satis->fiyat = $toplam_fiyat;
        $satis->save();

        // Ürün stokunu güncelle
        $urun->adet -= $request->adet;
        $urun->save();

        return redirect()->route('satis-index')->with('success', 'Satış başarıyla gerçekleştirildi.');
    }
}
