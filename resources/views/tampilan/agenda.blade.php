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
                        <li class="current">{{ $pagetitle }}</li>
                    </ol>
                </nav>
                <h1>{{ $pagetitle }}</h1>
            </div>
        </div><!-- End Page Title -->

        <!-- Portfolio Details Section -->
        <section id="portfolio-details" class="portfolio-details section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Kegiatan</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">#</th>
                                    <!-- <th scope="col">Handle</th> -->
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($agenda as $d)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $d->title }}</td>
                                    <td>{{ $d->date }}</td>
                                    <td>{{ $d->time }}</td>
                                    <td>{{ $d->lokasi }}</td>
                                    <td>{!! Str::words($d->keterangan, 20) !!}</td>
                                    <td> <a href="{{ route ('tampilan.detailagenda', ['id' => $d->id]) }}" class="btn btn-primary"><i class="fas fa-pen"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
@endsection