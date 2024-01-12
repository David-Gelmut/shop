@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Продукты</h1>
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
                        <div class="card-header">
                            <a href="{{route('product.create')}}" class="btn btn-primary">Добавить продукт</a>
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
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                 @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td><a href="{{route('product.show',$product)}}">{{$product->title}}</a></td>
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
                                    <td>
                                        <div class="input-group-prepend">
                                            <div class="dropdown-menu">
                                                <a target="_blank" class="dropdown-item text-gray" href="{{'/products/'.$product->id}}">Показать продукт</a>
                                                <a class="dropdown-item text-gray" href="{{route('product.edit',$product)}}">Редактировать продукт</a>
                                                <form action="{{route('product.delete',$product)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="dropdown-item text-gray">Удалить продукт</button>
                                                </form>
                                            </div>
                                            <i class="fa fa-cog text-gray pt-2 pr-1" data-toggle="dropdown" aria-expanded="false" aria-hidden="true"></i>
                                        </div>
                                    </td>
                                </tr>
                                 @endforeach
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
