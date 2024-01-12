@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить заказ</h1>
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
                <form action="{{route('order.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Имя">
                    </div>
                    <div class="form-group">
                        <input type="text" name="desc" class="form-control" placeholder="Телефон">
                    </div>
                    <div class="form-group">
                        <textarea name="data" id="" cols="80" rows="10" placeholder="Данные"></textarea>
                    </div>
                    <div class="form-group"><button class="btn btn-primary" type="submit">Добавить заказ</button></div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
