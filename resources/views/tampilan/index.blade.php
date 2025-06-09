@extends('layout.views')
@section('isi')
<!-- <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" /> -->

<style>
    .berita-aside {
        background-color: #f7f7f7;
        padding: 20px;
        border: 1px solid #ddd;
        margin-top: 20px;
    }

    .berita-aside h3 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .berita-aside ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .berita-aside li {
        margin-bottom: 10px;
    }

    .berita-aside a {
        text-decoration: none;
        color: #337ab7;
    }

    .berita-aside a:hover {
        color: #23527c;
    }

    .item {
        cursor: pointer;
        padding: 10px;
        border: 1px solid #ddd;
        margin: 5px;
        text-align: center;
    }

    .item.active {
        background-color: #337ab7;
        /* Ganti dengan warna yang diinginkan */
        color: white;
        /* Ganti dengan warna teks yang diinginkan */
    }

    .card-body img {
        width: 100%;
        /* Atur lebar gambar agar sesuai dengan lebar kontainer */
        height: 150px;
        /* Tentukan tinggi gambar agar sama untuk semua gambar */
        object-fit: cover;
        /* Memastikan gambar mengisi area yang ditentukan tanpa merusak rasio aspek */
    }
</style>

<!-- Hero Section -->
<section id="hero" class="hero section dark-background">
    <!-- <img src="{{ asset('mte/assets/img/polibang.png') }}" alt=""> -->

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                @foreach($dash as $d)
                <h1>{{ $d->title }}</h1>
                <p>{{ $d->instansi }}</p>
                <div class="d-flex">
                    <!-- <a href="#about" class="btn-get-started">Publikasi</a> -->
                    <!-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ asset('storage/photo-dash/'.$d->image) }}" class="img-fluid animated" alt="">
            </div>
            @endforeach
        </div>
    </div>

</section><!-- /Hero Section -->


<!-- Clients Section -->

<!-- /Clients Section -->

<!-- About Section -->
<section id="about" class="about section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Penelitian dan Pengabdian Masyarakat</h2>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-3">
            <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                @foreach($tentang as $bout)
                <p>
                    {!! Str::words(strip_tags($bout->ourbout), 30) !!}
                </p>
                <ul>
                    <!-- <li><i class="bi bi-check2-circle"></i> <span>{{ nl2br(e(Str::words($bout->misi, 10))) }}</span></li> -->
                    @endforeach
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <!-- <div class="sidebar">
                    <div class="col-lg-5" data-aos="fade-up" data-aos-delay="200">
                        <aside class="berita-aside">
                            <h3>Berita Terbaru</h3>
                            <ul>
                                <li><a href="#">Berita 1</a></li>
                                <li><a href="#">Berita 2</a></li>
                                <li><a href="#">Berita 3</a></li>
                                <li><a href="#">Berita 4</a></li>
                                <li><a href="#">Berita 5</a></li>
                            </ul>
                        </aside>
                    </div>
                </div> -->
                <!-- <p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p> -->
                <strong>Baca Lebih Banyak Mengenai Kami</strong> <br>
                <a href="{{ route('tampilan.tentangp3m') }}" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a> <br>
                <div><br></div>
                <!-- <a href="#" class="read-more"><span>Jurnal</span><i class="bi bi-arrow-right"></i></a> -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <!-- <p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p> -->
                    <!-- <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a> <br> -->
                    <strong>Jurnal Penelitian dan Pengabdian</strong>
                    <a href="https://www.polibang.ac.id/maktab" class="read-more"><span>Jurnal</span><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>


        </div>

    </div>

</section><!-- /About Section -->

<!-- <section id="why-us" class="section why-us light-background" data-builder="section">

    <div class="container-fluid">

        <div class="row gy-4">

            <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

                <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
                    <h3><span>Eum ipsam laborum deleniti </span><strong>velit pariatur architecto aut nihil</strong></h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                    </p>
                </div>

                <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

                    <div class="faq-item faq-active">

                        <h3><span>01</span> Non consectetur a erat nam at lectus urna duis?</h3>
                        <div class="faq-content">
                            <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>

                    <div class="faq-item">
                        <h3><span>02</span> Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h3>
                        <div class="faq-content">
                            <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>

                    <div class="faq-item">
                        <h3><span>03</span> Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                        <div class="faq-content">
                            <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>

                </div>

            </div>

            <div class="col-lg-5 order-1 order-lg-2 why-us-img">
                <img src="{{ asset('mte/assets/img/why-us.png') }}" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
            </div>
        </div>

    </div>

</section> -->
<section id="call-to-action" class="call-to-action section dark-background">

    <img src="{{ asset('mte/assets/img/polibang.png') }}" alt="">

    <div class="container">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-xl-9 text-center text-xl-start">
                <h3>Cari Tau Yuk !!</h3>
                <p>Cari tahu bagaimana P3M mendukung penelitian dan pengabdian masyarakat untuk dosen dan mahasiswa.</p>
            </div>
            <div class="col-xl-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="{{ route('tampilan.panduan') }}">Pelajari Panduan</a>
            </div>
        </div>

    </div>

</section><!-- /Call To Action Section -->
<!-- Services Section -->
<section id="services" class="services section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Berita P3M</h2>
        <p>Berita Pelaksanaan Kegiatan P3M di Politeknik Balekambang Jepara</p>
    </div>
    <!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">
            @foreach($agenda as $genda)
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                    <h4><a href="" class="stretched-link">{{ $genda -> title }}</a></h4>
                    <p><i class="far fa-calendar-alt" style="color: #4A628A;"></i> : {{ $genda->date }} <br></p>
                </div>
            </div>
            @endforeach
        </div>

    </div>

</section><!-- /Services Section -->

<!-- Call To Action Section -->


<!-- Berita Section -->
<section id="portfolio" class="portfolio section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Kegiatan P3M</h2>
        <p>Dokumentasi Kegiatan P3M Di Politeknik Balekambang Jepara</p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-5">
            @foreach($berita->take(3) as $d)
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="cards">
                    <div class="card-body">
                        <img src="{{ asset('storage/photo-news/'.$d->image) }}" class="img-fluid animated" style="border-radius: 10px;" alt="">

                        <h5 class="card-title mt-3">{!! Str::words(strip_tags($d->title), 10) !!}</h5>
                        <hr>
                        <small><i class="fas fa-calendar-week"></i> {{ $d->date }}</small> <br>
                        <!-- <small class="mt-4" style="font-style: italic;">{{ optional($d->user)->name }}</small> -->
                        <p class="card-text">{!! Str::words(strip_tags($d->content), 10) !!}</p>
                        <a href="{{ route('tampilan.detail', ['id' => $d->id]) }}" class="btn btn-outline-warning" style="text-align: center; margin: 0 auto;">Detail...</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="text-center mt-4" data-aos="zoom-in" data-aos-delay="100">
                <a href="{{ route('tampilan.berita') }}" class="">Selengkapnya -></a> <!-- Ganti dengan route yang sesuai -->
            </div>
        </div>
        <!-- <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                @foreach($categories as $c)

                <li data-filter=".{{ $c->filter_class }}" class="item">{{ $c->name }}</li>
                @endforeach
            </ul>

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <img src="{{ asset('mte/assets/img/masonry-portfolio/masonry-portfolio-1.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 1</h4>
                        <p>Lorem ipsum, dolor sit</p>
                        <a href="{{ asset('mte/assets/img/masonry-portfolio/masonry-portfolio-1.jpg') }}" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                    <img src="{{ asset('mte/assets/img/masonry-portfolio/masonry-portfolio-2.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Product 1</h4>
                        <p>Lorem ipsum, dolor sit</p>
                        <a href="{{ asset('assets/img/masonry-portfolio/masonry-portfolio-2.jpg') }}" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                    <img src="{{ asset('mte/assets/img/masonry-portfolio/masonry-portfolio-3.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Branding 1</h4>
                        <p>Lorem ipsum, dolor sit</p>
                        <a href="{{ asset('mte/assets/img/masonry-portfolio/masonry-portfolio-3.jpg') }}" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div>

        </div> -->
    </div>

</section><!-- /Berita Section -->

<!-- Team Section -->
<section id="team" class="team section dark-background">

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
            <div class="text-center mt-4" data-aos="zoom-in" data-aos-delay="100">
                <a href="{{ route('tampilan.struktur') }}" class="">Selengkapnya -></a>
            </div>
        </div>

    </div>

</section><!-- /Team Section -->


<!-- Faq 2 Section -->
<!-- <section id="faq-2" class="faq-2 section light-background">


    <div class="container section-title" data-aos="fade-up">
        <h2>Frequently Asked Questions</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
    </div>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-10">

                <div class="faq-container">

                    <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="200">
                        <i class="faq-icon bi bi-question-circle"></i>
                        <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                        <div class="faq-content">
                            <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                        <i class="faq-icon bi bi-question-circle"></i>
                        <h3>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h3>
                        <div class="faq-content">
                            <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                        <i class="faq-icon bi bi-question-circle"></i>
                        <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                        <div class="faq-content">
                            <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                        <i class="faq-icon bi bi-question-circle"></i>
                        <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                        <div class="faq-content">
                            <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
                        <i class="faq-icon bi bi-question-circle"></i>
                        <h3>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</h3>
                        <div class="faq-content">
                            <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section> -->

<!-- Contact Section -->
<!-- <section id="contact" class="contact section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-lg-5">

                <div class="info-wrap">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Address</h3>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>
                    </div>

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Call Us</h3>
                            <p>+1 5589 55488 55</p>
                        </div>
                    </div>

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email Us</h3>
                            <p>info@example.com</p>
                        </div>
                    </div>
                    <iframe src="http://www.google.com/maps/place/Politeknik+Balekambang/@-6.7222896,110.775183,17z/data=!4m14!1m7!3m6!1s0x2e70dd4a51453157:0xb3c2ba4e447cc93f!2sPoliteknik+Balekambang!8m2!3d-6.7222949!4d110.7777633!16s%2Fg%2F11hdlmb02z!3m5!1s0x2e70dd4a51453157:0xb3c2ba4e447cc93f!8m2!3d-6.7222949!4d110.7777633!16s%2Fg%2F11hdlmb02z?entry=ttu&g_ep=EgoyMDI0MTExMy4xIKXMDSoASAFQAw%3D%3D" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <div class="col-lg-7">
                <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">

                        <div class="col-md-6">
                            <label for="name-field" class="pb-2">Your Name</label>
                            <input type="text" name="name" id="name-field" class="form-control" required="">
                        </div>

                        <div class="col-md-6">
                            <label for="email-field" class="pb-2">Your Email</label>
                            <input type="email" class="form-control" name="email" id="email-field" required="">
                        </div>

                        <div class="col-md-12">
                            <label for="subject-field" class="pb-2">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject-field" required="">
                        </div>

                        <div class="col-md-12">
                            <label for="message-field" class="pb-2">Message</label>
                            <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                        </div>

                        <div class="col-md-12 text-center">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>

                            <button type="submit">Send Message</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>

    </div>

</section> -->
@endsection

<script>
    document.querySelectorAll('.item').forEach(item => {
        item.addEventListener('click', () => {
            // Hapus class 'active' dari semua item
            document.querySelectorAll('.item').forEach(i => i.classList.remove('active'));

            // Tambahkan class 'active' pada item yang diklik
            item.classList.add('active');
        });
    });
</script>