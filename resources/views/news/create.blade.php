@extends('layout.main')
@section('content')
<!-- summernote -->
@section('css')
<!-- Summernote -->
<link rel="stylesheet" href="{{ asset('lte/plugins/summernote/summernote-bs4.min.css') }}">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
@endsection

<style>
    .custom-option {
        background-color: #fff;
        /* or any other color you prefer */
        color: #333;
        /* or any other text color you prefer */
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Adding Data</h1>
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
            <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Up Bertia Terbaru</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form style="align-content: center;">
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <div class="form-group-prepend">
                                            <label for="image">Upload</label>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                        @error('image')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="title">
                                        @error('title')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group ">
                                        <label for="exampleInputEmail1">Tanggal Pembuatan</label>
                                        <input type="date" name="date" class="form-control" id="exampleInputEmail1" placeholder="date" style="width: 150px;">
                                        @error('date')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="textarea">Isi Berita</label>
                                        <!-- <textarea name="content" id="compose-textarea" class="form-control" style="height: 300px"></textarea> -->
                                        <textarea id="summernote" class="form-control"></textarea>
                                        <!-- <textarea name="content" class="form-control" id="summernote"></textarea> -->
                                        @error('content')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Kategori : </label>
                                        <select class="custom-select form-control-border" id="exampleSelectBorder" name="category_id">
                                            @foreach($categories as $d)
                                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                                            @endforeach
                                        </select> <br><br>
                                        @error('category_id')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
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
@section('scripts')
<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Bundle -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Summernote -->
<script src="{{ asset('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<script script>
    $(document).ready(function() {
        $('.konten').summernote();
    });
</script>
<script>
    $(document).ready(function() {
        console.log('jquery:', typeof $);
        console.log('summernote:', typeof $.fn.summernote);

        $('#summernote').summernote({
            height: 300,
            placeholder: 'Tulis isi berita di sini...'
        });
    });
</script>
@endsection



@endsection