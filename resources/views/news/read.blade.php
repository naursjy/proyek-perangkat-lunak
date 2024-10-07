@extends('layout.main')
@section('content')

<style>
    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $pagetitle }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $pagetitle }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('news.read' , ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ $pagetitle }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="">
                                <div class="card-body">
                                    <div class="form-container">
                                        @if($data->image)
                                        <img src="{{ asset('storage/photo-news/'.$data->image) }}" alt="preview-image" width="100px" height="120px" id="preview-image" class="img-thumbnail" style="justify-content: center;">
                                        @endif
                                        <!-- <div class="form-group mb-3">
                                            <div class="form-group-prepend">
                                                <label for="image">Gambar Berita</label>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Judul</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ $data->title }}" readonly>
                                        @error('title')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group" readonly>
                                        <label for="exampleInputEmail1">Konten</label>
                                        <textarea name="content" class="form-control" id="editor" aria-readonly="true">{{ $data->content }}</textarea>
                                        @error('content')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group" readonly>
                                        <label for="exampleInputPassword1">Kategory</label>
                                        <select name="category_id" id="category_id" readonly>
                                            @foreach($categories as $d)
                                            <option value="{{ $d->id }}" {{ $data->category_id == $d->id ? 'selected' : ''}}>{{ $d->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </form>
    </section>
    <!-- /.content -->
</div>

@endsection