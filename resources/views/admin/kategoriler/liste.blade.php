@extends('admin.layouts.master')
@section('title', 'Kategoriler')
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
                        <a href="{{ route('kategori-ekle') }}" class="btn btn-success"><i class="fa fa-plus"></i> Kategori
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
                                    <th>Kategori Adı</th>
                                    <th>Ürün Adeti</th>
                                    <th>Oluşturma Tarihi</th>
                                    <th>İşlemler </th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoriler as $kategori)
                                    <tr>
                                        <td>{{ $kategori->id }}</td>
                                        <td>{{ $kategori->adi }}</td>
                                        <td>{{ $kategori->productCount() }}</td>
                                        <td>{{ $kategori->created_at == null ? $kategori->created_at : \Carbon\Carbon::parse($kategori->created_at)->format('d.m.Y H:i:s') }}
                                        </td>
                                        <td width="10%">
                                            <form action="{{ route('kategori-delete', $kategori->id) }}" method="Post">
                                                <a href="{{ route('kategori-duzenle', $kategori->id) }}" title="Düzenle"
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

    {{-- <<script>
        function deleteFile(r, id) {
            var list = r.parentNode.parentNode.rowIndex;
            return new swal({
                title: 'Bu Dokümanı Silmek İstediğinize Emin Misiniz?',
                text: "Sildiğinizde Geri Dönüşüm Kutusuna Taşınacaktır!",
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'İptal',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Evet, Sil!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "Post",
                        url: '{{ route('admin-document-delete') }}',
                        data: {
                            'id': id,
                            'delete': 'delete'
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                document.getElementById('dataTable').deleteRow(list);
                                toastr.success(response.content, response.title, response.data);
                            } else {
                                toastr.error(response.content, response.title);
                            }
                        }

                    })
                } else {}
            })
        }
    </script> --}}
@endsection
