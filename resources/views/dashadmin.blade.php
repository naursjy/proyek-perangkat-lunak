<!-- <ul class="nav nav-treeview">
    <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
                Logout
            </p>
        </a>
    </li>
</ul> -->
@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Pengelola Website P3M </h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dash.dashadmin') }}">Home</a></li>
                        <li class="breadcrumb-item active">Pengelola P3M</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row" style="text-align: center; padding:170px;">
                <h2>Selamat Datang Di Halaman Pengelola Website P3M Politeknik Balekambang Jepara</h2>
                <h4>Mengelola Konten dan Data P3M</h4>

            </div>
        </div>
    </section>
</div>
@endsection