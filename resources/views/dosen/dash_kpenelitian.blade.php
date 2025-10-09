@extends('layout.doslayout')
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
                        <li class="breadcrumb-item"><a href="">Home</a></li>
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
                    <a href="{{ route('dosen.add_kumnpeneliti') }}" class="btn btn-primary"> <b>+</b></a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title p-1">{{ $pagetitle }}</h3> <span></span>
                            <div class="card-tools">
                                <form action="" method="get">
                                    <div class="input-group input-group-sm" style="width: 100px;">
                                        <div class="input-group-append p-1">
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
                                        <th>Judul</th>
                                        <th>Bidang Ilmu</th>
                                        <th>Kategori</th>
                                        <th>Ketua Peneliti</th>
                                        <th>Aksi</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penelitians as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! Str::words($d->judul, 10) !!}</td>
                                        <td>{!! $d->bidang !!}</td>
                                        <td>{!! $d->jeniskategori !!}</td>

                                        <td>{!! $d->ketua !!}</td>

                                        <!-- <td>
                                             <ul>
                                                 @foreach($d->anggotap3m as $anggota)
                                                 <li>
                                                     {!! $anggota->nama !!} - {!! $anggota->prodi !!} -{!! $anggota->jabatan !!}
                                                 </li>
                                                 @endforeach
                                             </ul>
                                         </td> -->
                                        <!-- <td><img src="{{ asset('storage/photo-upp3m/' . $d->foto) }}" alt="image" width="100px" height="120px"></td> -->
                                        <!-- <td><a href="{{ asset('storage/uppdf/' . $d->uppdf) }}" target="_blank">Lihat File</a></td> -->
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('detail.detailk', ['tipe' => 'kpeneliti', 'id' => $d->id]) }}" class="btn btn-info text-white rounded-circle m-1"><i class="fas fa-eye white"></i></a>
                                                <a href="{{ route('dosen.edit_kpenliti',['id' => $d->id]) }}" class="btn btn-primary rounded-circle m-1"><i class="fas fa-pen"></i></a>
                                                <a href="{{ route ('dosen.delete', ['id' => $d->id]) }}" class="btn btn-danger rounded-circle m-1"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                        <td>@if($d->status === 'approve')
                                            <span class="badge bg-success">
                                                ✅ Disetujui
                                            </span>
                                            <small class="text-primary ms-1"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Silahkan konfirmasi dengan Ketua P3M"
                                                style="cursor: pointer; text-decoration: underline;">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </small>

                                            @elseif($d->status === 'proses')
                                            <span class="badge badge-warning">⏳ Proses</span>
                                            @else
                                            <span class="badge badge-danger">❌ Non-approve</span>
                                            @endif
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