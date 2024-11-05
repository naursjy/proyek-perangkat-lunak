@extends('layout.views')
@section('isi')

<style>
    .card-body img {
        width: 100%;
        height: 150px;
        object-fit: cover;
    }
</style>
<section id="team" class="team section light-background mt-5">

    <!-- Section Title -->
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