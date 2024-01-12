@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Заказы</h1>
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
                            <a href="{{route('order.create')}}" class="btn btn-primary">Добавить заказ</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Имя</th>
                                    <th>Телефон</th>
                                    <th>Дата создания</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                 @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td><a href="{{route('order.show',$order)}}">{{$order->name}}</a></td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                        <div class="input-group-prepend">
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item text-gray" href="{{route('order.show',$order)}}">Показать заказ</a>
                                                <a class="dropdown-item text-gray" href="{{route('order.edit',$order)}}">Редактировать заказ</a>
                                                <form action="{{route('order.delete',$order)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="dropdown-item text-gray">Удалить заказ</button>
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
