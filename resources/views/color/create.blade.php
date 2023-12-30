@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить цвет</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{route('color.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Выберите цвет</label>
                        <input type="text" name="title" class="form-control my-colorpicker1 colorpicker-element" data-colorpicker-id="1" data-original-title="" title="">
                    </div>
                    <div class="form-group"><button class="btn btn-primary" type="submit">Добавить цвет</button></div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
