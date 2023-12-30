@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить тэг</h1>
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
                <form action="{{route('tag.store')}}" method="post">
                    @csrf
                    <div class="form-group"> <input class="form-control" name="title" type="text"></div>
                    <div class="form-group"><button class="btn btn-primary" type="submit">Добавить тэг</button></div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
