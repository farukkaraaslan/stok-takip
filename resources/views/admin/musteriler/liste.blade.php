@extends('admin.layouts.master')
@section('title', 'Müşteriler')
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
                        <a href="{{ route('musteri-ekle') }}" class="btn btn-success"><i class="fa fa-plus"></i> Müşteri
                            Ekle</a>
                        <span class="float-right"><strong></strong></span>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- eski-->
                        <table id="dataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>TC Kimlik No</th>
                                    <th>Adı</th>
                                    <th>Soyadı</th>
                                    <th>Fatura</th>
                                    <th>Kayıt Tarihi</th>
                                    <th>İşlemler </th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($musteriler as $musteri)
                                    <tr>
                                        <td>{{ $musteri->id }}</td>
                                        <td>{{ $musteri->tc_no }}</td>
                                        <td>{{ $musteri->adi }}</td>
                                        <td>{{ $musteri->soyadi }}</td>
                                        <td>{{ $musteri->fatura_no }}</td>
                                        <td>{{ $musteri->created_at == null ? $musteri->created_at : \Carbon\Carbon::parse($musteri->created_at)->format('d.m.Y H:i:s') }}
                                        </td>
                                        <td width="10%">
                                            <form action="{{ route('musteri-delete', $musteri->id) }}" method="Post">
                                                <a href="{{ route('musteri-duzenle', $musteri->id) }}" title="Düzenle"
                                                    class="btn btn-primary"> <i class="fa fa-pen"></i></a>
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
