@extends('layout.doslayout')
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
                    <a href="{{ route('dosen.addp3m') }}" class="btn btn-primary mb-2">+</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dokumen P3M</h3>

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

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Bidang Ilmu</th>
                                        <th>Kategori</th>
                                        <th>Lokasi</th>
                                        <th>Waktu Penelitian</th>
                                        <th>Biaya</th>
                                        <th>Ketua Peneliti</th>
                                        <th>Jenis Kelamin</th>
                                        <th>NIDN</th>
                                        <th>Prodi</th>
                                        <th>No. Telp</th>
                                        <th>Alamat</th>
                                        <th>Anggota</th>
                                        <th>Foto</th>
                                        <th>File Laporan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penelitians as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! Str::words($d->judul, 10) !!}</td>
                                        <td>{!! $d->bidang !!}</td>
                                        <td>{!! $d->kategori?->name !!}</td>
                                        <td>{!! $d->lokasi !!}</td>
                                        <td>{!! $d->lamapenelitian !!}</td>
                                        <td>{!! $d->biaya !!}</td>
                                        <td>{!! $d->ketua !!}</td>
                                        <td>{!! $d->jeniskelamin !!}</td>
                                        <td>{!! $d->nidn !!}</td>
                                        <td>{!! $d->prodi !!}</td>
                                        <td>{!! $d->telp !!}</td>
                                        <td>{!! $d->alamat !!}</td>
                                        <td>
                                            <ul>
                                                @foreach($d->anggotap3m as $anggota)
                                                <li>
                                                    {!! $anggota->nama !!} - {!! $anggota->prodi !!} -{!! $anggota->jabatan !!}
                                                </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td><img src="{{ asset('storage/photo-upp3m/' . $d->foto) }}" alt="image" width="100px" height="120px"></td>
                                        <td><a href="{{ asset('storage/uppdf/' . $d->uppdf) }}" target="_blank">Lihat File</a></td>

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