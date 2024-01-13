<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2/css/select2.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/summernote/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <h3 class="animation__shake"  height="60" width="60">SHOP</h3>
    </div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" target="_blank" href="/">Перейти на сайт</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                @auth
                <a   href="{{route('user.show',Auth::user()->id)}}">{{ Auth::user()->name }}</a>
                <p class="text-green">online</p>
                    <form  action="{{ route('logout') }}" method="POST" >
                        @csrf
                        <button type="submit" class="btn btn-outline-primary">Выйти</button>
                    </form>
                @endauth
            </li>
        </ul>
    </nav>

    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('main.index')}}" class="brand-link">
            <span class="brand-text font-weight-light">SHOP</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    @can('view',auth()->user())
                    <li class="nav-item d-flex">
                        <div class="input-group-prepend">
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-gray" href="{{route('order.create')}}">Добавить заказ</a>
                            </div>
                            <i class="fa fa-cog text-gray pt-2 pr-1" data-toggle="dropdown" aria-expanded="false" aria-hidden="true"></i>
                        </div>
                        <a  href="{{route('order.index')}}" class="nav-link pt-1">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            <p>Заказы</p>
                        </a>
                    </li>
                    @endcan
                    <li class="nav-item d-flex">
                        <div class="input-group-prepend">
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-gray" href="{{route('product.create')}}">Добавить продукт</a>
                            </div>
                            <i class="fa fa-cog text-gray pt-2 pr-1" data-toggle="dropdown" aria-expanded="false" aria-hidden="true"></i>
                        </div>
                        <a  href="{{route('product.index')}}" class="nav-link pt-1">
                            <i class="fa fa-barcode" aria-hidden="true"></i>
                            <p>Продукты</p>
                        </a>
                    </li>
                    <li class="nav-item d-flex">
                        <div class="input-group-prepend">
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-gray" href="{{route('category.create')}}">Добавить категорию</a>
                            </div>
                            <i class="fa fa-cog text-gray pt-2 pr-1" data-toggle="dropdown" aria-expanded="false" aria-hidden="true"></i>
                        </div>
                        <a  href="{{route('category.index')}}" class="nav-link pt-1">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            <p >Категории</p>
                        </a>
                    </li>
                    <li class="nav-item d-flex">
                        <div class="input-group-prepend">
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-gray" href="{{route('tag.create')}}">Добавить тэг</a>
                            </div>
                            <i class="fa fa-cog text-gray pt-2 pr-1" data-toggle="dropdown" aria-expanded="false" aria-hidden="true"></i>
                        </div>
                        <a href="{{route('tag.index')}}" class="nav-link">
                            <i class="fa fa-tag" aria-hidden="true"></i>
                            <p>Тэги</p>
                        </a>
                    </li>
                    <li class="nav-item d-flex">
                        <div class="input-group-prepend">
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-gray" href="{{route('color.create')}}">Добавить цвет</a>
                            </div>
                            <i class="fa fa-cog text-gray pt-2 pr-1" data-toggle="dropdown" aria-expanded="false" aria-hidden="true"></i>
                        </div>
                        <a href="{{route('color.index')}}" class="nav-link">
                            <i class="fa fa-paint-brush" aria-hidden="true"></i>
                            <p>Цвета</p>
                        </a>
                    </li>
                    @can('view',auth()->user())
                    <li class="nav-item d-flex">
                        <div class="input-group-prepend">
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-gray" href="{{route('user.create')}}">Добавить пользователя</a>
                            </div>
                            <i class="fa fa-cog text-gray pt-2 pr-1" data-toggle="dropdown" aria-expanded="false" aria-hidden="true"></i>
                        </div>
                        <a href="{{route('user.index')}}" class="nav-link">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <p>Пользователи</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>


    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2022 - {{now()->year}}<a href="{{route('main.index')}}">SHOP</a>.</strong>
        All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/select2/js/select2.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $(document).ready(function(){
        // Summernote
        $('#summernote').summernote();

        $('.tags').select2();
        $('.colors').select2();

        $.widget.bridge('uibutton', $.ui.button);

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        let sum_order = 0;
        $('.product-order-cart').each(function(){
            let price =  $(this).find('.product-order-cart-price').text();
            let count =  $(this).find('.product-order-cart-count').text();
            sum_order+=price*count;
        })
        $('.sum-order').text(sum_order);

    });
</script>
</body>
</html>
