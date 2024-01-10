@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Обновить продукт</h1>
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
                <a class="btn btn-primary" href="{{route('product.index')}}">На страницу с продуктами</a>
            </div>
            <div class="row">
                <form action="{{route('product.update',$product)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" value="{{$product->title}}" placeholder="Название">
                    </div>
                    <div class="form-group">
                        <input type="text" name="desc" class="form-control" value="{{$product->desc}}" placeholder="Описание">
                    </div>
                    <div class="form-group">
                        <textarea id="summernote" type="text" name="content" class="form-control h-auto"  placeholder="Контент">{{$product->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" class="form-control" value="{{$product->price}}" placeholder="Цена">
                    </div>
                    <div class="form-group">
                        <input type="text" name="count" class="form-control" value="{{$product->count}}" placeholder="Количество на складе">
                    </div>
                    <div class="form-group">
                        <img style="margin: 10px;" src="{{asset('storage/'.$product->prev_image )}}" alt="" width="250px;" height="250px;">
                        <div class="input-group">
                            <div class="custom-file">
                                <input   name="prev_image" type="file" class="custom-file-input">
                                <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option {{$category->id===$product->category->id?'selected':''}} value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="tags[]" class="tags" multiple="" data-placeholder="Выберите тэги" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option  {{in_array($tag->id,$product->tags->pluck('id')->toArray() )?'selected':''}} value="{{$tag->id}}">{{($tag->title)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="colors[]" class="colors" multiple="" data-placeholder="Выберите цвета" style="width: 100%;">
                            @foreach($colors as $color)
                                <option  {{in_array($color->id,$product->colors->pluck('id')->toArray() )?'selected':''}} value="{{$color->id}}">{{$color->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group"><button class="btn btn-primary" type="submit">Обновить продукт</button></div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
