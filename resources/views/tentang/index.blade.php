@extends('layout.main')
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
                        <li class="breadcrumb-item active">{{ $pagetitle }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tentang P3M</h3>
                            <div class="card-tools">
                                <form action="{{ route('category.index') }}" method="get">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('tentang.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                            <a href="{{ route('tentang.edit',  ['id' => $bout->first()->id]) }}" class="btn btn-info"><i class="fas fa-pen"></i></a>
                                            <a href="{{ route('tentang.edit',  ['id' => $bout->first()->id]) }}" class="btn btn-warning"><i class="fas fa-eye white"></i></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Visi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bout as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! Str::words($d->visi) !!}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Misi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bout as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! Str::words($d->misi) !!}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tentang P3M</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bout as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! Str::words($d->ourbout) !!}</td>
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
        </div>
        <!-- /.card-body -->
    </section>
</div>

@endsection