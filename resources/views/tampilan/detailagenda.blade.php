@extends('layout.views')
@section('isi')

<style>
    .portfolio-info a {
        color: #000;
        /* Mengatur warna font menjadi hitam */
        text-decoration: none;
        /* Menghilangkan garis bawah */
        font-size: inherit;
        /* Mengambil ukuran font dari elemen induk */
        font-weight: inherit;
        /* Mengambil ketebalan font dari elemen induk */
    }

    .portfolio-info a:hover {
        text-decoration: underline;
        /* Menambahkan garis bawah saat hover */
    }

    ul {
        list-style-type: square;
        /* Mengatur bullet point menjadi kotak */
        padding-left: 20px;
    }

    li {
        margin-bottom: 12px;
        /* Jarak antar item */
    }

    h6 {
        font-weight: bold;
        /* Mengatur ketebalan font */
        margin-bottom: 5px;
        /* Jarak antara h6 dan p */
    }

    .card-text {
        font-size: 14px;
        /* Ukuran font untuk deskripsi */
        color: #666;
        /* Warna deskripsi */
        margin: 0;
        /* Menghilangkan margin default */
    }
</style>

<body class="portfolio-details-page mt-5">

    <main class="main mt-5">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container">
                <nav class="breadcrumbs mt-5">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Detail Kegiatan</li>
                    </ol>
                </nav>
                <h1>Detail Kegiatan</h1>
            </div>
        </div><!-- End Page Title -->

        <!-- Portfolio Details Section -->
        <section id="portfolio-details" class="portfolio-details section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper init-swiper">
                            <!-- <div class="swiper-pagination"></div> -->
                        </div>
                        <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
                            <h2>{{ $agen->title }}</h2>
                            <!-- <h6><i class="far fa-calendar-alt" style="color: #4A628A;"></i> : {{ $agen->date }}</h6> -->
                            <p>
                                <i class="far fa-calendar-alt" style="color: #4A628A;"></i> : {{ $agen->date }} <br>
                                <i class="far fa-clock"></i> : {{ $agen->date }}
                                {!! $agen->keterangan !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
                            <h3>{{ $pagetitle }}</h3>
                            <ul>
                                @foreach($agenda as $agen)
                                <li>
                                    <h6>
                                        <i class="far fa-newspaper"></i>
                                        <a href="{{ route('tampilan.agenda', ['id' => $agen->id]) }}" style="color: #133E87;">{{ $agen->title }}</a>
                                    </h6>
                                    <p>{{ Str::words(strip_tags($agen->date), 10) }}</p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
@endsection