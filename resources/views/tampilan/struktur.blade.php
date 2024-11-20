@extends('layout.views')
@section('isi')

<style>
    .card-body img {
        width: 100%;
        height: 150px;
        object-fit: cover;
    }
</style>
<div class="page-title mt-5" data-aos="fade">
    <div class="container">
        <nav class="breadcrumbs mt-5">
            <ol>
                <li><a href="#">Home</a></li>
                <li class="current">{{ $pagetitle }}</li>
            </ol>
        </nav>
        <h1>{{ $pagetitle }}</h1>
        <small>Politeknik Balekambang Jepara</small>
    </div>
</div>

<section id="team" class="team section mt-5">
    <div class="container section-title" data-aos="fade-up">
        <h2>Team P3M</h2>
        <p>Pengelola Pusat Penelitian dan Pengabdian Masyarakat</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">
            @foreach($pengelola as $d)
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="team-member d-flex align-items-start">
                    <div class="pic"><img src="{{ asset('storage/photo-pengelola/'.$d->image) }}" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>{{ $d->nama_pengelola }}</h4>
                        <span>{{ $d->jabatan_pengelola }}</span>
                        <p>{{ $d->NIDN }}</p>
                        <div class="social">
                            <a href="mailto:{{ $d->email_pengelola }}"><i class="bi bi-envelope"></i></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

</section><!-- /Team Section -->
@endsection