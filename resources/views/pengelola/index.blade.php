@extends('layout.main')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('lte/../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte/../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte/../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

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
                    <h1 class="m-0">{{ $pagetitle }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dash.dashboard') }}">Home</a></li>
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
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIDN</th>
                                        <th colspan="2">Gambar</th>
                                        <th>Jabatan</th>
                                        <th>Email</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengelola as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->nama_pengelola }}</td>
                                        <td>{{ $d->NIDN }}</td>
                                        <td colspan="2"><img src="{{ asset('storage/photo-pengelola/'. $d->image) }}" alt="" width="100"></td>
                                        <td>{{ $d->jabatan_pengelola }}</td>
                                        <td>{{ $d->email_pengelola }}</td>
                                        <td colspan="3">
                                            <a href="{{ route ('pengelola.edit', ['id' => $d->id]) }}" class="btn btn-primary custom-btn"><i class="fas fa-pen"> </i>edit</a>
                                            <a href="{{ route ('pengelola.delete', ['id' => $d->id]) }}" class="btn btn-danger custom-btn"><i class="fas fa-trash"> </i>delete</a>
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
</div>


@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('lte/../../plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('lte/../../plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('lte/../../plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        setTimeout(function() {
            console.log("Hiding alert");
            $('.alert').fadeOut('slow');
        }, 5000); // 5000 ms = 5 detik
    });
</script>
@endsection