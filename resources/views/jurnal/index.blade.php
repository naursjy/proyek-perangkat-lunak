@extends('layout.main')
@section('content')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css" />
@endsection

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
                    <a href="{{ route('jurnal.create') }}" class="btn btn-primary mb-2">+</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Jurnal P3M</h3>

                            <div class="card-tools">
                                <form action="" method="get">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body table-responsive">
                            <table class="table table-hover" id="clientside">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>File PDF</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jurnal as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! Str::words($d->jurnalname, 10) !!}</td>
                                        <!-- <td>{{ $d->link }}</td> -->
                                        <td>
                                            <!-- <a href="{{ $d->google_drive_link }}" class="btn btn-secondary custom-btn" target="_blank"><i class="fas fa-eye"></i> Buka di Google Drive</a> -->
                                            <div class="btn-group" role="group">
                                                <a href="{{ $d->link }}" class="btn btn-info" target="_blank"><i class="fa fa-link white"></i></a>
                                                <a href="{{ route ('jurnal.edit', ['id' => $d->id]) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="{{ route ('jurnal.delete', ['id' => $d->id]) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
        </div>
        <!-- /.card-body -->
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