@extends('admin.layouts.master')
@section('title', 'Satışlar')
@section('css')

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
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('satis-ekle') }}" class="btn btn-success"><i class="fa fa-plus"></i>Satış Yap</a>
                        <span class="float-right"><strong></strong></span>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- eski-->
                        <table id="dataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ürün Adı</th>
                                    <th>Müşteri Adı</th>
                                    <th>Müşteri Soyadı</th>
                                    <th>Ürün Adeti</th>
                                    <th>Toplam Fiyat</th>
                                    <th>Oluşturma Tarihi</th>
                                    <th>İşlemler </th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($satislar as $satis)
                                    <tr>
                                        <td>{{ $satis->id }}</td>
                                        <td>{{ $satis->getUrun->adi }}</td>
                                        <td>{{ $satis->getMusteri->adi }}</td>
                                        <td>{{ $satis->getMusteri->soyadi }}</td>
                                        <td>{{ $satis->adet }}</td>
                                        <td>{{ $satis->fiyat }}</td>
                                        <td>{{ $satis->created_at == null ? $satis->created_at : \Carbon\Carbon::parse($satis->created_at)->format('d.m.Y H:i:s') }}
                                        </td>
                                        <td width="10%">
                                            <form action="" method="Post">
                                                <a href="" title="Düzenle" class="btn btn-primary"> <i
                                                        class="fa fa-pen"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fa fa-trash-alt"></i></button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </section>
    </div>

@endsection

@section('js')
    <script src="{{ asset('backend') }}/js/sweetalert2.js"></script>
    <script src="{{ asset('backend') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
@endsection
