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
                        <h6>
                            <span class="mailbox-read-time float-right">{{ $data->date }}</span>
                            <span class="mailbox-read-time float-right">{{ $data->time }}</span>
                            <span class="mailbox-read-time float-right">{{ $data->lokasi }}</span>
                        </h6>
                    </div>

                    <div class="mailbox-read-message">
                        <p>{!! $data->keterangan !!}</p>
                    </div>
                    <!-- /.mailbox-read-message -->
                </div>

                <div class="card-footer">
                    <div class="float-right">
                        <a href="{{ route('agenda.index') }}" type="button" class="btn btn-default"><i class="fas fa-reply"></i> Back</a>
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