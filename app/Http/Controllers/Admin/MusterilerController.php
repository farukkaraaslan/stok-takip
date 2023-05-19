<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Musteriler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MusterilerController extends Controller
{
    public function index()
    {
        $musteriler = Musteriler::orderBy('created_at', 'DESC')->get();
        return view('admin/musteriler/liste', compact('musteriler'));
    }
    public function create()
    {
        return view('admin/musteriler/olustur');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tc_no' => 'required|numeric|digits:11|unique:musterilers',
            'adi' => 'required',
            'soyadi' => 'required',
        ], [
            'adi.required' => 'Müşteri Adı alanı zorunludur.',
            'tc_no.required' => 'TC No alanı zorunludur.',
            'tc_no.numeric' => 'TC No alanı sayısal bir değer olmalıdır.',
            'tc_no.digits' => 'TC No 11 karakter olmalıdır.',
            'soyadi.required' => 'Müşteri Soyadı alanı zorunludur.',
            'tc_no.unique' => 'Bu TC No zaten kayıtlıdır.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Musteriler::create($request->post());

        return redirect()->route('musteri-index')->with('success', 'Müşteri Başarı İle Oluşturuldu.');
    }
    public function edit($id)
    {
        $musteri = Musteriler::find($id);
        return view('admin/musteriler/duzenle', compact('musteri'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tc_no' => [
                'required',
                'numeric',
                'digits:11',
                Rule::unique('musterilers')->ignore($id),
            ],
            'adi' => 'required',
            'soyadi' => 'required',
        ], [
            'adi.required' => 'Müşteri Adı alanı zorunludur.',
            'tc_no.required' => 'TC No alanı zorunludur.',
            'tc_no.numeric' => 'TC No alanı sayısal bir değer olmalıdır.',
            'tc_no.digits' => 'TC No 11 karakter olmalıdır.',
            'soyadi.required' => 'Müşteri Soyadı alanı zorunludur.',
            'tc_no.unique' => 'Bu TC No zaten kayıtlıdır.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Musteriler::find($id)->update($request->post());

        return redirect()->route('musteri-index')->with('success', 'Müşteri Başarı İle Güncellendi.');
    }
    public function destroy($id)
    {
        Musteriler::find($id)->delete();
        return redirect()->route('musteri-index')->with('success', 'Müşteri başarı İle Silindi');
    }
}
