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
                        <li class="breadcrumb-item"><a href="{{ route('plppm.kpenelitian') }}">Home</a></li>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $pagetitle }}</h3>
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
                                        <th style="width: 20px;">Judul</th>
                                        <th>Bidang Ilmu</th>
                                        <th>Kategori</th>
                                        <th>Ketua Peneliti</th>
                                        <th style="width: 120px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penelitians as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! Str::words($d->judul, 7) !!}</td>
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
                                        <td style="white-space: nowrap;">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('detail.detailk', ['tipe' => 'kpeneliti', 'id' => $d->id]) }}" class="btn btn-info text-white"><i class="fas fa-eye white"></i></a>
                                                <!-- <a href="{{ route('dosen.edit_kpenliti',['id' => $d->id]) }}" class="btn btn-primary rounded-circle m-1"><i class="fas fa-pen"></i></a> -->
                                                <!-- <a href="#" class="btn btn-danger rounded-circle m-1"><i class="fas fa-trash"></i></a> -->
                                            </div>

                                            @php
                                            // Atur class button sesuai status
                                            $btnClass = match($d->status) {
                                            'approve' => 'btn-success', // hijau
                                            'proses' => 'btn-warning', // kuning
                                            'non-approve' => 'btn-danger', // merah
                                            default => 'btn-secondary', // default
                                            };
                                            @endphp
                                            <div class="btn-group">
                                                <button type="button" class="btn {{ $btnClass }} btn-sm dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{ ucfirst($d->status) }}
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Approve -->
                                                    <form action="{{ route('plppm.kumpulan.status', ['tipe' => 'kum_penelitian', $d->id]) }}" method="POST" class="px-3 py-1">
                                                        @csrf
                                                        @method('patch')
                                                        <input type="hidden" name="status" value="approve">
                                                        <button type="submit" class="dropdown-item" onclick="return confirm('Yakin ingin approve pengajuan ini?')">
                                                            ✅ Approve
                                                        </button>
                                                    </form>

                                                    <!-- Proses -->
                                                    <form action="{{ route('plppm.kumpulan.status', ['tipe' => 'kum_penelitian', $d->id]) }}" method="POST" class="px-3 py-1">
                                                        @csrf
                                                        @method('patch')
                                                        <input type="hidden" name="status" value="proses">
                                                        <button type="submit" class="dropdown-item" onclick="return confirm('Set status jadi proses?')">
                                                            ⏳ Proses
                                                        </button>
                                                    </form>

                                                    <!-- Non-approve -->
                                                    <form action="{{ route('plppm.kumpulan.status', ['tipe' => 'kum_penelitian', $d->id]) }}" method="POST" class="px-3 py-1">
                                                        @csrf
                                                        @method('patch')
                                                        <input type="hidden" name="status" value="non-approve">
                                                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Tolak pengajuan ini?')">
                                                            ❌ Non-approve
                                                        </button>
                                                    </form>
                                                </div>
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