@extends('layout.main')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css" />
@endsection

@section('content')

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
                        <li class="breadcrumb-item"><a href="{{ route('dash.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Kegiatan P3M</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('news.create') }}" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah</a>
                    @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kegiatan P3M POLIBANG </h3>
                            <!-- <div class="card-tools">
                                <form action="{{ route('news.index') }}" method="get">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="search" class="form-control float-right" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table class="table table-hover" id="clientside">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Tanggal</th>
                                        <th>Pembuat</th>
                                        <th>Gambar</th>
                                        <th>Kategory</th>
                                        <th>ISI</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->title }}</td>
                                        <td>{{ $d->date }}</td>
                                        <td>{{ optional($d->user)->name }}</td>
                                        <td><img src="{{ asset('storage/photo-news/'.$d->image) }}" alt="" width="100"></td>
                                        <td>{{ $d->category->name }}</td>
                                        <td>{!! Str::words($d->content, 20) !!}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route ('news.read', ['id' => $d->id]) }}" class="btn btn-info text-white"><i class="fas fa-eye white"></i></a>
                                                <a href="{{ route ('news.edit', ['id' => $d->id]) }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                                <a href="{{ route ('news.delete', ['id' => $d->id]) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
@section('scripts')
<script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#clientside').DataTable();
    });
</script>
@endsection