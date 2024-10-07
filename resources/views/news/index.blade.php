@extends('layout.main')
@section('content')
<style>
    /* table {
        width: 250px;
    }

    table td {
        word-wrap: break-word;
        min-width: 10px;
    } */
    /* table td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    } */
    table {
        table-layout: fixed;
        width: 100%;
    }

    .custom-btn {
        border-radius: 50px;
    }

    table td {
        width: 200px;
        max-width: 40px;
        /* word-wrap: break-all;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis; */
    }

    .col-md-3 {
        width: 25%;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">NEWS UKM JURNALIS POLIBANG</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
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
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('news.create') }}" class="btn btn-primary mb-2">Tambah</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Berita UKM Jurnalistik POLIBANG</h3>

                            <div class="card-tools">
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
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover" class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Titile</th>
                                        <th>Gambar</th>
                                        <th>Kategory</th>
                                        <th class="col-md-3">ISI</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->title }}</td>
                                        <td><img src="{{ asset('storage/photo-news/'.$d->image) }}" alt="" width="100"></td>
                                        <td>{{ $d->category->name }}</td>
                                        <td id="news-content">{!! Str::words($d->content, 20) !!}</td>
                                        <td colspan="3">
                                            <a href="{{ route ('news.read', ['id' => $d->id]) }}" class="btn btn-info custom-btn"><i class="fas fa-eye"></i>Detail</a>
                                            <a href="{{ route ('news.edit', ['id' => $d->id]) }}" class="btn btn-primary custom-btn"><i class="fas fa-pen"></i>edit</a>
                                            <a href="{{ route ('news.delete', ['id' => $d->id]) }}" class="btn btn-danger custom-btn"><i class="fas fa-trash"></i>hapus</a>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </section>
    <!-- /.content -->
</div>


@endsection