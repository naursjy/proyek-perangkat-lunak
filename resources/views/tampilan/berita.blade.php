@extends('layout.views')
@section('isi')

<!-- <style>
    @gray-darker: #444444;
    @gray-dark: #696969;
    @gray: #999999;
    @gray-light: #cccccc;
    @gray-lighter: #ececec;
    @gray-lightest: lighten(@gray-lighter, 4%);

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    html {
        background-color: #f0f0f0;
    }

    body {
        color: @gray;
        font-family: 'Roboto', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-style: normal;
        font-weight: 400;
        letter-spacing: 0;
        padding: 1rem;
        text-rendering: optimizeLegibility;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        -moz-font-feature-settings: "liga" on;
    }

    img {
        height: auto;
        max-width: 100%;
        vertical-align: middle;
    }

    .btn {
        background-color: white;
        border: 1px solid @gray-light;
        //border-radius: 1rem;
        color: @gray-dark;
        padding: 0.5rem;
        text-transform: lowercase;
    }

    .btn--block {
        display: block;
        width: 100%;
    }

    .cards {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .cards__item {
        display: flex;
        padding: 1rem;

        @media(min-width: 40rem) {
            width: 50%;
        }

        @media(min-width: 56rem) {
            width: 33.3333%;
        }
    }

    .card {
        background-color: white;
        border-radius: 0.25rem;
        box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
        display: flex;
        flex-direction: column;
        overflow: hidden;

        &:hover {
            .card__image {
                filter: contrast(100%);
            }
        }
    }

    .card__content {
        display: flex;
        flex: 1 1 auto;
        flex-direction: column;
        padding: 1rem;
    }

    .card__image {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
        filter: contrast(70%);
        //filter: saturate(180%);
        overflow: hidden;
        position: relative;
        transition: filter 0.5s cubic-bezier(.43, .41, .22, .91);
        ;

        &::before {
            content: "";
            display: block;
            padding-top: 56.25%; // 16:9 aspect ratio
        }

        @media(min-width: 40rem) {
            &::before {
                padding-top: 66.6%; // 3:2 aspect ratio
            }
        }
    }

    .card__image--flowers {
        background-image: url(https://unsplash.it/800/600?image=82);
    }

    .card__image--river {
        background-image: url(https://unsplash.it/800/600?image=11);
    }

    .card__image--record {
        background-image: url(https://unsplash.it/800/600?image=39);
    }

    .card__image--fence {
        background-image: url(https://unsplash.it/800/600?image=59);
    }

    .card__title {
        color: @gray-dark;
        font-size: 1.25rem;
        font-weight: 300;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .card__text {
        flex: 1 1 auto;
        font-size: 0.875rem;
        line-height: 1.5;
        margin-bottom: 1.25rem;
    }
</style> -->

<style>
    .card-body img {
        width: 100%;
        /* Atur lebar gambar agar sesuai dengan lebar kontainer */
        height: 150px;
        /* Tentukan tinggi gambar agar sama untuk semua gambar */
        object-fit: cover;
        /* Memastikan gambar mengisi area yang ditentukan tanpa merusak rasio aspek */
    }
</style>
<section id="team" class="team section">
    <div class="container">
        <!-- Section Title -->
        <div class="container section-title mt-5" data-aos="fade-up">
            <h2>Berita P3M POLIBANG</h2>
        </div><!-- End Section Title -->
        <div class="content-wrapper mt-1 p-1">
            <!-- <ul class="cards">
            <li class="cards__item">
                <div class="card">
                    <div class="card__image card__image--fence"></div>
                    <div class="card__content">
                        <div class="card__title">Flex</div>
                        <p class="card__text">This is the shorthand for flex-grow, flex-shrink and flex-basis combined. The second and third parameters (flex-shrink and flex-basis) are optional. Default is 0 1 auto. </p>
                        <button class="btn btn--block card__btn">Button</button>
                    </div>
                </div>
            </li>
        </ul> -->

            <!-- <div class="row gy-4">
                @foreach($berita as $d)
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">

                    <div class="team-member d-flex align-items-start">
                        <div class="img"><img src="{{ asset('storage/photo-news/'.$d->image) }}" class="" style="width: 100%; height: 150px; object-fit: contain; border-radius: 0;"></div>
                        <div class="member-info">
                            <h4>{{ $d->title }}</h4>
                            <span>Accountant</span>
                            <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""> <i class="bi bi-linkedin"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> -->

            <div class="row gy-4">
                @foreach($berita as $d)
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="cards mb-3">
                        <div class="card-body">
                            <img src="{{ asset('storage/photo-news/'.$d->image) }}" class="img-fluid animated" style="border-radius: 10px;" alt="">
                            <small>{{ optional($d->user)->name }}</small>
                            <h5 class="card-title mt-3">{{ $d->title }}</h5>
                            <p class="card-text">{{ Str::words(strip_tags($d->content), 10) }}</p>
                            <a href="{{ route('tampilan.detail', ['id' => $d->id]) }}" class="btn btn-outline-warning" style="text-align: center; margin: 0 auto;">Detail..</a>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection