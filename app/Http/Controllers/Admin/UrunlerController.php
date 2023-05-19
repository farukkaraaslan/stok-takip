<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategoriler;
use App\Models\Urunler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UrunlerController extends Controller
{
    public function index()
    {
        $urunler = Urunler::orderBy('created_at', 'DESC')->get();
        return view('admin/urunler/liste', compact('urunler'));
    }
    public function create()
    {
        $kategoriler = Kategoriler::orderBy('adi')->get();
        return view('admin/urunler/olustur', compact('kategoriler'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'adi' => 'required',
            'kategori_id' => 'required',
            'adet' => 'required|numeric',
        ], [
            'adi.required' => 'Ürün Adı alanı zorunludur.',
            'kategori_id.required' => 'Kategori Adı alanı zorunludur.',
            'adet.required' => 'Adet alanı zorunludur.',
            'adet.numeric' => 'Adet alanı sayısal bir değer olmalıdır.'
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Urunler::create($request->post());

        return redirect()->route('urun-index')->with('success', 'Ürün Başarı İle Oluşturuldu.');
    }

    public function edit($id)
    {
        $urun = Urunler::find($id);
        $kategoriler = Kategoriler::all();
        return view('admin/urunler/duzenle', compact('urun', 'kategoriler'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'adi' => 'required',
            'kategori_id' => 'required',
            'adet' => 'required|numeric',
        ], [
            'adi.required' => 'Ürün Adı alanı zorunludur.',
            'kategori_id.required' => 'Kategori Adı alanı zorunludur.',
            'adet.required' => 'Adet alanı zorunludur.',
            'adet.numeric' => 'Adet alanı sayısal bir değer olmalıdır.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $urun = Urunler::find($id);
        $urun->update($request->all());
        return redirect()->route('urun-index')->with('success', 'Ürün Başarı İle Güncellendi.');
    }
    public function destroy($id)
    {
        $urun = Urunler::find($id);

        $urun->delete();
        return redirect()->route('urun-index')->with('success', 'Ürün başarı İle Silindi');
    }
}
