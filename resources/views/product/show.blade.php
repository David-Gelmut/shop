@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Продукт {{$product->title}}</h1>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-3">
                            <div class="mr-3">
                                <a href="{{route('product.edit',$product)}}" class="btn btn-primary">Обновить продукт</a>
                            </div>
                            <form action="{{route('product.delete',$product)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Удалить продукт</button>
                            </form>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Кол-во</th>
                                    <th>Цена</th>
                                    <th>Цвета</th>
                                    <th>Тэги</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->desc}}</td>
                                        <td>{{$product->count}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>
                                            @foreach($product->colors as $color)
                                                <p style="background-color: {{$color->title}};border-radius: 10px;width: 20px;height: 20px;"></p>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($product->tags as $tag)
                                                <p style="background-color:#007aff;color: #f6f6f6;padding: 1px;border-radius: 10px;text-align: center;">{{$tag->title}}</p>
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
