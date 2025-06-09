@extends('layout.main')
@section('content')


<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{ asset('lte/../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte/../../plugins/summernote/summernote-bs4.min.css') }}">
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('lte/../../plugins/daterangepicker/daterangepicker.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('path/to/bootstrap-datetimepicker.css') }}"> -->
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
                                        <textarea name="content" class="form-control" id="compose-textarea"></textarea>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('lte/../../plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<!-- date-range-picker -->
<script src="{{ asset('lte/../../plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('lte/../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="path/to/moment.js"></script>
<script src="path/to/bootstrap-datetimepicker.js"></script>
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