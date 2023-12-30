@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Обновить категорию</h1>
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
            <div class="form-group">
                <a class="btn btn-primary" href="{{route('category.index')}}">На страницу с категориями</a>
            </div>
            <div class="row">
                <form action="{{route('category.update',$category)}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group"><input class="form-control w-50" name="title" value="{{$category->title}}" type="text"></div>
                    <div class="form-group"><button class="btn btn-primary" type="submit">Обновить категорию</button></div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
