@extends('admin.layouts.master')ist
@section('title', 'Ürün Ekle')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet"
        href="{{ asset('admin') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Anasayfa</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <form method="post" action="{{ route('urun-add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-aling-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">@yield('title')</h3>

                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Ürün Adı</label>
                                        <input type="text" name="adi" class="form-control"
                                            value="{{ old('adi') }}" />
                                        @error('adi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Adet</label>
                                        <input type="text" name="adet" class="form-control"
                                            value="{{ old('adet') }}" />
                                        @error('adet')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Fiyat</label>
                                        <input type="text" name="fiyat" class="form-control"
                                            value="{{ old('fiyat') }}" />
                                        @error('adet')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Kategori Seçiniz</label>
                                        <select name="kategori_id" class="form-control">
                                            <option value="" selected disabled>Seçim Yapınız</option>
                                            @foreach ($kategoriler as $kategori)
                                                <option value="{{ $kategori->id }}"
                                                    @if (old('kategori_id') == $kategori->id) selected @endif>{{ $kategori->adi }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kategori_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-default" href="">Geri</a>
                                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

@endsection

@section('js')
    <script src="{{ asset('admin') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/moment/locale/tr.js"></script>
    <script src="{{ asset('admin') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="{{ asset('admin') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script>
        $(function() {
            $('#datetimepicker').datetimepicker({
                format: 'L'
            });
            $('#datetimepicker2').datetimepicker({
                format: 'L'
            });
        })
    </script>
@endsection
