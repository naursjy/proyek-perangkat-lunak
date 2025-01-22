@extends('layout.main')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css" />
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $pagetitle }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dash.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $pagetitle }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('pengelola.create') }}" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah</a>
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
                            <h3 class="card-title">Pengelola P3M POLIBANG</h3>
                            <div class="card-tools">
                                <form action="{{ route('pengelola.index') }}" method="get">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ $request->get('search') }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover" id="clientside">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIDN</th>
                                        <th>Gambar</th>
                                        <th>Jabatan</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengelola as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->nama_pengelola }}</td>
                                        <td>{{ $d->NIDN }}</td>
                                        <td><img src="{{ asset('storage/photo-pengelola/'. $d->image) }}" alt="" width="100"></td>
                                        <td>{{ $d->jabatan_pengelola }}</td>
                                        <td>{{ $d->email_pengelola }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route ('pengelola.edit', ['id' => $d->id]) }}" class="btn btn-primary custom-btn"><i class="fas fa-pen"> </i></a>
                                                <a href="{{ route ('pengelola.delete', ['id' => $d->id]) }}" class="btn btn-danger custom-btn"><i class="fas fa-trash"> </i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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