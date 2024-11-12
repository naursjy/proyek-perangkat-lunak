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
                        <li><a href="#">Home</a></li>
                        <li class="current">{{ $pagetitle }}</li>
                    </ol>
                </nav>
                <h1>{{ $pagetitle }}</h1>
                <small>Politeknik Balekambang Jepara</small>
            </div>
        </div><!-- End Page Title -->

        <!-- Portfolio Details Section -->
        <section id="portfolio-details" class="portfolio-details section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Panduan</th>
                                <th scope="col">Get</th>
                                <!-- <th scope="col">Handle</th> -->
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($panduan as $d)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $d->original_name }}</td>
                                <td>
                                    <a href="{{ asset('uplouds/' . $d->original_name) }}"><i class="fas fa-download"></i> Download</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>
@endsection