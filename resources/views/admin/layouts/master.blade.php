<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Stok Takip Sistemi')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('admin') }}/dist/img/favicon.ico">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/toastr/toastr.min.css">
    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary ">
            <a href="" class="brand-link">
                <img src="{{ asset('admin') }}/dist/img/AdminLTELogo.png" alt="jsga" class="brand-image"
                    style="max-height: 45px">

            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('admin') }}/dist/img/avatar.png" alt="User Image">
                    </div>
                    <div class="info">

                        {{-- <a href="" class="d-block">{{Auth::user()->name}}</a> --}}
                    </div>
                </div>

                <nav class="mt-2">

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li
                            class="nav-item has-treeview {{ request()->is('urun', 'kategori', 'urun/ekle', 'urun/duzenle/*', 'kategori/ekle', 'kategori/duzenle/*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file-import"></i>
                                <p>
                                    Ürünler
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview ">
                                <li class="nav-item">
                                    <a href=" {{ route('urun-index') }}"
                                        class="nav-link {{ request()->is('urun', 'urun/ekle', 'urun/duzenle/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ürün Listesi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('kategori-index') }}"
                                        class="nav-link {{ request()->is('kategori', 'kategori/ekle', 'kategori/duzenle/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kategori Listesi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item has-treeview {{ request()->is('musteri', 'musteri/ekle', 'musteri/duzenle/*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Müşteriler
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('musteri-index') }}"
                                        class="nav-link {{ request()->is('musteri', 'musteri/ekle', 'musteri/duzenle/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Müşteri Listesi</p>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <li class="nav-item has-treeview {{ request()->is('satis') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Satışlar
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('satis-index') }}"
                                        class="nav-link {{ request()->is('satis', 'satis/satis-yap') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Satış Listesi</p>
                                    </a>
                                </li>
                            </ul>

                        </li>
                    </ul>

                </nav>
            </div>
        </aside>

        @yield('content')

        <aside class="control-sidebar control-sidebar-dark">
        </aside>

        <footer class="main-footer">
            <div class="copyright text-center my-auto">
                <span>Bilgi Teknolojileri Daire Başkanlığı &copy; {{ date('Y') }}</span>
            </div>
        </footer>
    </div>
    <script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
    <!-- DataTables  & Plugins -->


    <script src="{{ asset('admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables/dataTablecustomTR.js"></script>
    <script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="{{ asset('admin') }}/dist/js/adminlte.js"></script>
    <script src="{{ asset('admin') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{ asset('admin') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/chart.js/Chart.min.js"></script>
    <script src="{{ asset('admin') }}/dist/js/pages/dashboard2.js"></script>
    <script src="{{ asset('admin') }}/plugins/toastr/toastr.min.js"></script>
    {{-- {!! Toastr::message() !!}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script> --}}
    <script>
        @if (session('success'))
            toastr.options = {
                "positionClass": "toast-top-right",
                "closeButton": true,
                "progressBar": true,
                "timeOut": 5000,
                "extendedTimeOut": 2000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success('{{ session('success') }}');
        @endif

        @if (session('error'))
            toastr.options = {
                "positionClass": "toast-top-right",
                "closeButton": true,
                "progressBar": true,
                "timeOut": 5000,
                "extendedTimeOut": 2000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error('{{ session('error') }}');
        @endif
    </script>
    @yield('js')
</body>

</html>
