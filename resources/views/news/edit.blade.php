@extends('layout.main')
@section('content')
<link rel="stylesheet" href="{{ asset('lte/../../plugins/summernote/summernote-bs4.min.css') }}">
<style>
    .img-preview {
        /* max-width: 250px;
        max-height: 250px;
        object-fit: contain;
        display: block; */

        max-width: 200px;
        height: auto;
        object-fit: contain;
        margin: 0 auto;
        display: block;

        /* width="100px" height="120px" */
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editing Data</h1>
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
            <form action="{{ route('news.update' , ['id' => $news->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ $pagetitle }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="">
                                <div class="card-body">
                                    @if($news->image)
                                    <img src="{{ asset('storage/photo-news/'.$news->image) }}" class="img-preview" alt="preview-image" id="preview-image">
                                    @endif
                                    <div class="form-group mb-3">
                                        <div class="form-group-prepend">
                                            <label for="image">Upload</label>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                            <small> <u>*pilih gambar jika ingin diganti/biarkan</u></small>
                                        </div>
                                        @error('image')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Judul</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ $news->title }}">
                                        @error('title')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tanggal</label>
                                        <input type="date" name="date" class="form-control" id="title" placeholder="Enter title" value="{{ $news->date }}">
                                        @error('date')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Isi Berita</label>
                                        <textarea name="content" class="form-control" id="compose-textarea">{{ $news->content }}</textarea>
                                        @error('content')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Kategori : </label>
                                        <select class="custom-select form-control-border" id="exampleSelectBorder" name="category_id">
                                            @foreach($categories as $d)
                                            <option value="{{ $d->id }}" {{ $news->category_id == $d->id ? 'selected' : ''}}>{{ $d->name }}</option>
                                            @endforeach
                                        </select> <br><br>
                                        @error('category_id')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </form>
    </section>
    <!-- /.content -->
</div>
<script src="{{ asset('lte/../../plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- <script>
    // Inisialisasi CKEditor
    CKEDITOR.replace('editor', {
        filebrowserUploadUrl: 'photo-news/', // URL untuk meng-upload gambar
        filebrowserUploadMethod: 'form'
    });
</script> -->
<script>
    $(function() {
        //Add text editor 
        $('#compose-textarea').summernote()
    })
</script>


<script>
    $('#summernote').summernote({
        placeholder: 'Hello Bootstrap 5',
        tabsize: 2,
        height: 100
    });

    $('#reservationdate').datetimepicker({
        format: 'L'
    });
</script>
@endsection