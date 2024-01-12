@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить пользователя</h1>
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
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="form-group"> <input placeholder="Имя" value="{{old('name')}}" class="form-control" name="name" type="text"></div>
                    <div class="form-group"> <input placeholder="Email" value="{{old('email')}}" class="form-control" name="email" type="text"></div>
                    <div class="form-group"> <input placeholder="Пароль" value="{{old('password')}}" class="form-control" name="password" type="text"></div>
                    <div class="form-group"> <input placeholder="Подтверждение пароля" value="{{old('password_confirmation')}}" class="form-control" name="password_confirmation" type="text"></div>
                    <div class="form-group"> <input placeholder="Фамилия" value="{{old('firstname')}}" class="form-control" name="firstname" type="text"></div>
                    <div class="form-group"> <input placeholder="Отчество" value="{{old('lastname')}}" class="form-control" name="lastname" type="text"></div>
                    <div class="form-group"> <input placeholder="Возраст" value="{{old('age')}}" class="form-control" name="age" type="text"></div>
                    <div class="form-group"> <input placeholder="Адрес" value="{{old('address')}}" class="form-control" name="address" type="text"></div>
                    <div class="form-group">
                        <select name="gender" class="custom-select form-control-border" id="exampleSelectBorder">
                            <option disabled selected>Пол</option>
                            <option {{old('gender')==1?'selected':''}} value="1">Мужской</option>
                            <option {{old('gender')==2?'selected':''}} value="2">Женский</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="role" class="custom-select form-control-border" id="exampleSelectBorder">
                            <option disabled selected>Роль</option>
                            @foreach($roles as $id=>$value)
                            <option {{old('role_id')==$id?'selected':''}} value="{{$id}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group"><button class="btn btn-primary" type="submit">Добавить пользователя</button></div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
