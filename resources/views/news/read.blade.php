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
    <section class="content">
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title" style="text-align: center;"><b>Detail Berita</b></h3>

                    <!-- <div class="card-tools">
                    <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                    <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                </div> -->
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="mailbox-read-info">
                        <h5>{{ $data->title }}</h5>
                        <h6>{{ $user -> name }}
                            <span class="mailbox-read-time float-right">{{ $data->date }}</span>
                        </h6>
                    </div>
                    <div class="form-container mt-3">
                        @if($data->image)
                        <img src="{{ asset('storage/photo-news/'.$data->image) }}" alt="preview-image" width="500px" height="500px" id="preview-image" class="img-thumbnail" style="justify-content: center;">
                        @endif
                        <!-- <div class="form-group mb-3">
                                            <div class="form-group-prepend">
                                                <label for="image">Gambar Berita</label>
                                            </div>
                                        </div> -->
                    </div>
                    <!-- /.mailbox-read-info -->
                    <!-- <div class="mailbox-controls with-border text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm" data-container="body" title="Delete">
                            <i class="far fa-trash-alt"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm" data-container="body" title="Reply">
                            <i class="fas fa-reply"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm" data-container="body" title="Forward">
                            <i class="fas fa-share"></i>
                        </button>
                    </div>
                    <button type="button" class="btn btn-default btn-sm" title="Print">
                        <i class="fas fa-print"></i>
                    </button>
                </div> -->
                    <div class="mailbox-read-message">
                        <p>{!! $data->content !!}</p>
                    </div>
                    <!-- /.mailbox-read-message -->
                </div>
                <!-- /.card-body -->
                <!-- <div class="card-footer bg-white">
                <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                    <li>
                        <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

                        <div class="mailbox-attachment-info">
                            <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> Sep2014-report.pdf</a>
                            <span class="mailbox-attachment-size clearfix mt-1">
                                <span>1,245 KB</span>
                                <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                            </span>
                        </div>
                    </li>
                    <li>
                        <span class="mailbox-attachment-icon"><i class="far fa-file-word"></i></span>

                        <div class="mailbox-attachment-info">
                            <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> App Description.docx</a>
                            <span class="mailbox-attachment-size clearfix mt-1">
                                <span>1,245 KB</span>
                                <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                            </span>
                        </div>
                    </li>
                    <li>
                        <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo1.png" alt="Attachment"></span>

                        <div class="mailbox-attachment-info">
                            <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo1.png</a>
                            <span class="mailbox-attachment-size clearfix mt-1">
                                <span>2.67 MB</span>
                                <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                            </span>
                        </div>
                    </li>
                    <li>
                        <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo2.png" alt="Attachment"></span>

                        <div class="mailbox-attachment-info">
                            <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo2.png</a>
                            <span class="mailbox-attachment-size clearfix mt-1">
                                <span>1.9 MB</span>
                                <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                            </span>
                        </div>
                    </li>
                </ul>
            </div> -->
                <!-- /.card-footer -->
                <div class="card-footer">
                    <div class="float-right">
                        <a href="{{ route('news.index') }}" type="button" class="btn btn-default"><i class="fas fa-reply"></i> Back</a>
                    </div>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection