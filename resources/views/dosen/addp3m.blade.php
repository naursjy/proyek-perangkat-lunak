@extends('layout.doslayout')
@section('content')

<style>
    .img-preview {
        max-width: 150px;
        height: auto;
        display: block;
        margin: 0 auto;
        object-fit: contain;
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
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">{{ $pagetitle }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('dosen.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">P3M Polibang Jepara</h3>
                            </div>
                            <!-- /.card-header -->
                            <form style="align-content: center;">
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Penelitian dan Pengabdian</label> <br>
                                                    <small>Judul Penelitian :</small>
                                                    <input type="text" name="judul" class="form-control" placeholder="Enter ..."><br>
                                                    <small>Bidang Ilmu :</small>
                                                    <input type="text" name="bidang" class="form-control" placeholder="Enter ..."><br>
                                                    <small>Kategori P3M :</small>
                                                    <select class="custom-select form-control-border" id="exampleSelectBorder" name="kategori_id">
                                                        @foreach($categories as $d)
                                                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                                                        @endforeach
                                                    </select> <br><br>
                                                    <small>Lokasi :</small>
                                                    <input type="text" name="lokasi" class="form-control" placeholder="Enter ..."><br>
                                                    <small>Lama Penelitian :</small>
                                                    <input type="text" name="lamapenelitian" class="form-control" placeholder="Enter ..."><br>
                                                    <small>Biaya :</small>
                                                    <input type="text" name="biaya" class="form-control" placeholder="Enter ..."><br>
                                                    <small>Unggah Laporan</small>
                                                    <div class="form-group mb-3">
                                                        <div class="custom-file">
                                                            <input type="file" name="uppdf" class="custom-file-input" id="uploadLaporan">
                                                            <label class="custom-file-label" for="uploadLaporan">Unggah File</label>
                                                        </div>
                                                        @error('image')
                                                        <small>{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Biodata Ketua</label> <br>
                                                    <small>Nama Ketua :</small>
                                                    <input type="text" name="ketua" class="form-control" placeholder="Enter ..."><br>
                                                    <small>Jenis Kelamin :</small>

                                                    <select class="custom-select form-control-border" id="exampleSelectBorder" name="jeniskelamin">

                                                        <option value="">---Pilih---</option>
                                                        <option value="L">Laki - Laki</option>
                                                        <option value="P">Perempuan</option>

                                                    </select><br> <br>
                                                    <small>NIDN :</small>
                                                    <input type="text" name="nidn" class="form-control" placeholder="Enter ..."><br>
                                                    <small>Jabatan Fungsional :</small>
                                                    <input type="text" name="jabatan" class="form-control" placeholder="Enter ..."><br>
                                                    <small>Program Studi :</small>
                                                    <input type="text" name="prodi" class="form-control" placeholder="Enter ..."><br>
                                                    <small>No. Telepon :</small>
                                                    <input type="text" name="telp" class="form-control" placeholder="Enter ..."><br>
                                                    <small>Alamat :</small>
                                                    <input type="text" name="alamat" class="form-control" placeholder="Enter ..."><br>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div id="anggota-wrapper">
                                                    <div class="anggota-row">
                                                        <label class="col-form-label" for="">Anggota Penelitian</label> <button type="button" onclick="addAnggota()" class="btn btn-success"> <b>+</b> </button> <br>
                                                        <small>Nama :</small>
                                                        <input type="text" class="form-control" name="anggota[0][nama]" placeholder="Nama">
                                                        <small>Program Studi :</small>
                                                        <input type="text" class="form-control" name="anggota[0][prodi]" placeholder="Prodi">
                                                        <small>Jabatan :</small>
                                                        <input type="text" class="form-control" name="anggota[0][jabatan]" placeholder="Jabatan">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="form-group-prepend">
                                                    <label for="image">Unggah Gambar/Foto</label>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="foto" class="custom-file-input" id="uploadFoto">
                                                    <label class="custom-file-label" for="foto">Unggah Gambar</label>
                                                </div>
                                                @error('image')
                                                <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<script>
    let count = 1;

    function addAnggota() {
        const wrapper = document.getElementById('anggota-wrapper');
        const html = `
            <div class="anggota-row">
            <label class="col-form-label" for="">Anggota Penelitian</label> <br>
            <small>Nama :</small>
            <input type="text" class="form-control" name="anggota[${count}][nama]" placeholder="Nama">
            <small>Program Studi :</small>
            <input type="text" class="form-control" name="anggota[${count}][prodi]" placeholder="Prodi">
            <small>Jabatan :</small>
            <input type="text" class="form-control" name="anggota[${count}][jabatan]" placeholder="Jabatan">
            </div>
        `;
        wrapper.insertAdjacentHTML('beforeend', html);
        count++;
    }
</script>
<script>
    document.querySelectorAll('.custom-file-input').forEach(function(input) {
        input.addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            e.target.nextElementSibling.innerText = fileName;
        })
    });
</script>
<!-- <script>
    function previewImage() {
        const input = document.getElementById('upload');
        const preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script> -->
@endsection