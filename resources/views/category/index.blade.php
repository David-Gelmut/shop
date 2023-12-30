@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Категории</h1>
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
                            <a href="{{route('category.create')}}" class="btn btn-primary">Добавить категорию</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                 @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td><a href="{{route('category.show',$category)}}">{{$category->title}}</a></td>
                                    <td><div class="input-group-prepend">
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item text-gray" href="{{route('category.edit',$category)}}">Редактировать категорию</a>
                                                <form action="{{route('category.delete',$category)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="dropdown-item text-gray">Удалить категорию</button>
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
