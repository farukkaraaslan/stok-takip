<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategoriler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategorilerController extends Controller
{
    public function index()
    {
        $kategoriler = Kategoriler::orderBy('created_at', 'DESC')->get();
        return view('admin/kategoriler/liste', compact('kategoriler'));
    }
    public function create()
    {
        return view('admin/kategoriler/olustur');
    }
    public function store(Request $request)
    {
        $kategoriAdi = $request->post('adi');

        $kategori = Kategoriler::where('adi', $kategoriAdi)->first();

        if ($kategori) {
            return redirect()->back()->with('error', 'Aynı isimde bir kategori zaten mevcut.');
        }

        $validator = Validator::make($request->all(), [
            'adi' => 'required',
        ], [
            'adi.required' => 'Kategori Adı alanı zorunludur.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Kategoriler::create($request->post());

        return redirect()->route('kategori-index')->with('success', 'Ürün Başarı İle Oluşturuldu.');
    }
    public function edit($id)
    {
        $kategori = Kategoriler::find($id);
        return view('admin/kategoriler/duzenle', compact('kategori'));
    }
    public function update(Request $request, $id)
    {
        $kategoriAdi = $request->post('adi');

        $kategori = Kategoriler::where('adi', $kategoriAdi)->where('id', '!=', $id)->first();

        if ($kategori) {
            return redirect()->back()->with('error', 'Aynı isimde bir kategori zaten mevcut.');
        }

        $validator = Validator::make($request->all(), [
            'adi' => 'required',
        ], [
            'adi.required' => 'Kategori Adı alanı zorunludur.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $kategori = Kategoriler::find($id);
        $kategori->update($request->all());

        return redirect()->route('kategori-index')->with('success', 'Ürün Başarı İle Güncellendi.');
    }
    public function destroy($id)
    {
        $kategori = Kategoriler::find($id);
        if ($kategori->urunler()->exists()) {
            return redirect()->route('kategori-index')->with('error', 'Bu kategoriye ait ürünler olduğu için silme işlemi gerçekleştirilemez.Lütfen önce bu kategoriye ait ürünü güncelleyin');
        }
        $kategori->delete();

        return redirect()->route('kategori-index')->with('success', 'Kategori başarıyla silindi.');
    }
}
