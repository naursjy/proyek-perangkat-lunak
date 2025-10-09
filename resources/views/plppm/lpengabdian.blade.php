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
                         <li class="breadcrumb-item"><a href="{{ route('plppm.lpengabdian') }}">Home</a></li>
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
                             <h3 class="card-title">{{ $pagetitle }} </h3>
                             <!-- <div class="card-tools">
                                <form action="" method="get">
                                    <div class="input-group input-group-sm" style="width: 150px;">
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
                             <!-- <table class="table table-hover text-nowrap">
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
                            </table> -->

                             <table class="table table-hover" id="clientside">
                                 <thead>
                                     <tr>
                                         <th>No</th>
                                         <th>Judul</th>
                                         <th>Bidang Ilmu</th>
                                         <th>Kategori</th>
                                         <th>Ketua Peneliti</th>
                                         <th>Aksi</th>
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
                                                 <a href="{{ route('detail.detail', ['tipe' => 'ajupengab', 'id' => $d->id]) }}" class="btn btn-info text-white"><i class="fas fa-eye white"></i></a>
                                                 <!-- approval p3m -->

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
                                                     <form action="{{ route('plppm.ppengabdian.status', $d->id) }}" method="POST" class="px-3 py-1">
                                                         @csrf
                                                         @method('PATCH')
                                                         <input type="hidden" name="status" value="approve">
                                                         <button type="submit" class="dropdown-item" onclick="return confirm('Yakin ingin approve pengajuan ini?')">
                                                             ✅ Approve
                                                         </button>
                                                     </form>

                                                     <!-- Proses -->
                                                     <form action="{{ route('plppm.ppengabdian.status', $d->id) }}" method="POST" class="px-3 py-1">
                                                         @csrf
                                                         @method('PATCH')
                                                         <input type="hidden" name="status" value="proses">
                                                         <button type="submit" class="dropdown-item" onclick="return confirm('Set status jadi proses?')">
                                                             ⏳ Proses
                                                         </button>
                                                     </form>

                                                     <!-- Non-approve -->
                                                     <form action="{{ route('plppm.ppengabdian.status', $d->id) }}" method="POST" class="px-3 py-1">
                                                         @csrf
                                                         @method('PATCH')
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