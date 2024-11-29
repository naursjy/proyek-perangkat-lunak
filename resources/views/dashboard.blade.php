@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Main Page P2M Politeknik Balekambang Jepara</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dash.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
            <!-- @can('view_dashboard') -->
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('dash.create_dash') }}" class="btn btn-primary mb-2">Tambah</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dashboard Views</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Image</th>
                                        <th>judul</th>
                                        <th>Instansi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($dash as $d)
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('storage/photo-dash/'.$d->image) }}" alt="" width="100"></td>
                                        <td>{{ $d->title }}</td>
                                        <td><span class="tag tag-primary">{{ $d->instansi }}</span></td>
                                        <td><a href="{{ route('dash.edit_dash' , ['id' => $d->id]) }}" class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>
                                            <a href="#" class="btn btn-info"><i class="fas fa-eye"></i>Detail</a>
                                            <a data-toggle="modal" data-target="#modal-hapus" href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Delete</a>
                                        </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            @endcan
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection