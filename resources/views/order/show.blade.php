@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Заказ № {{$order->id}}</h1>
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
                                <a href="{{route('order.edit',$order)}}" class="btn btn-primary">Обновить заказ</a>
                            </div>
                            <form action="{{route('order.delete',$order)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Удалить заказ</button>
                            </form>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Имя</th>
                                    <th>Телефон</th>
                                    <th>Дата создания</th>
                                    <th>Данные</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->phone}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>
                                            {{($order->data)}}
                                            @if(is_array($order->data))
                                                @foreach(json_decode($order->data) as $key=>$item)
                                                    <div class="product-order-cart m-3">
                                                        <div><b>ID :</b> {{$key}}</div>
                                                        <div><b>Заголовок :</b> {{$item->title}}</div>
                                                        <div><b>Цена :</b> <span class="product-order-cart-price">{{$item->price}}</span></div>
                                                        <div><b>Количество на складе :</b> {{$item->count}}</div>
                                                        <div><b>Количество в заказе :</b> <span class="product-order-cart-count">{{$item->count_order}}</span></div>
                                                    </div>

                                                @endforeach
                                            @endif
                                            <div><b>Сумма заказа : </b> <span class="sum-order"></span></div>
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
