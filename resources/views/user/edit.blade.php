@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Обновить пользователя {{$user->name}}</h1>
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
                <a class="btn btn-primary" href="{{route('user.index')}}">На страницу с пользователями</a>
            </div>
            <div class="row">
                <form action="{{route('user.update',$user)}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group"> <input placeholder="Имя" value="{{$user->name??old('name')}}" class="form-control" name="name" type="text"></div>
                    <div class="form-group"> <input placeholder="Email" value="{{$user->email??old('email')}}" class="form-control" name="email" type="text"></div>
                    <div class="form-group"> <input placeholder="Фамилия" value="{{$user->firstname??old('firstname')}}" class="form-control" name="firstname" type="text"></div>
                    <div class="form-group"> <input placeholder="Отчество" value="{{$user->lastname??old('lastname')}}" class="form-control" name="lastname" type="text"></div>
                    <div class="form-group"> <input placeholder="Возраст" value="{{$user->age??old('age')}}" class="form-control" name="age" type="text"></div>
                    <div class="form-group"> <input placeholder="Адрес" value="{{$user->address??old('address')}}" class="form-control" name="address" type="text"></div>
                    <div class="form-group">
                        <select name="gender"  class="custom-select form-control-border" id="exampleSelectBorder">
                            <option disabled selected>Пол</option>
                            <option {{old('gender')==1||$user->gender==1?'selected':''}} value="1">Мужской</option>
                            <option {{old('gender')==2||$user->gender==2?'selected':''}} value="2">Женский</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="role" class="custom-select form-control-border" id="exampleSelectBorder">
                            <option disabled selected>Роль</option>
                            @foreach($roles as $id=>$value)
                                <option {{$user->role==$id?'selected':''}} value="{{$id}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group"><button class="btn btn-primary" type="submit">Обновить пользователя</button></div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
