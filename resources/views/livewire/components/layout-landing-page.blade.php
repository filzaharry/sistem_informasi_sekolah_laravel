<html>

<head>
    <title>Project Name</title>
    <meta charset="utf-8">
    <link rel='shortcut icon' href='stumbleupon.png' type='image/x-icon' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style_welcome.css" type="text/css">
    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/style-landingpage.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <svg class="shape-boxes1" viewBox="0 0 71 44" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="19" height="19" fill="#E1F0F7" />
        <rect y="25" width="19" height="19" fill="#0A4191" />
        <rect x="26" width="19" height="19" fill="#0A4191" />
        <rect x="26" y="25" width="19" height="19" fill="#FABD5C" />
        <rect x="52" width="19" height="19" fill="#F8A726" />
        <rect x="52" y="25" width="19" height="19" fill="#0A4191" />
    </svg>

    <svg class="shape-group1" viewBox="0 0 251 215" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="98" cy="98" r="98" fill="#0A4191" />
        <circle cx="182" cy="166" r="49" fill="#F8A726" />
        <rect x="168" y="63" width="22" height="22" fill="#FABD5C" />
        <rect x="198" y="63" width="23" height="22" fill="#FABD5C" />
        <rect x="229" y="63" width="22" height="22" fill="#FABD5C" />
    </svg>

    <svg class="shape-boxes2" viewBox="0 0 165 183" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd"
            d="M131.87 161.332C143.541 148.8 151.126 132.416 156.88 114.351C162.635 96.2857 166.493 76.6193 163.563 56.8373C160.632 37.0166 150.882 17.1588 136.214 7.97339C121.661 -1.08072 102.254 0.326244 84.0594 2.88509L83.5084 2.96297C65.155 5.57021 48.1353 9.29435 32.7873 19.0073C17.4734 28.719 3.83382 44.4969 0.905749 62.4648C-1.95802 80.2901 5.67919 100.338 14.2205 117.673L14.4796 118.197C23.0907 135.652 32.5266 150.327 45.0309 162.029C57.5351 173.73 73.1076 182.458 88.7907 182.501C104.44 182.544 120.164 173.865 131.87 161.332Z"
            fill="#F8A726" />
    </svg>





    {{-- Navbar --}}
    <section class="bg-white">
        <div class="container mx-custom">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between">
                <a href="/"
                    class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    <img src="{{ asset('images/logo.png') }}" alt="logo" width="150px">
                </a>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-4 link-custom">Home</a></li>
                    <li><a href="#" class="nav-link px-4 link-dark">Profil</a></li>
                    <li><a href="#" class="nav-link px-4 link-dark">E-Book</a></li>
                    <li><a href="#" class="nav-link px-4 link-dark">Kontak</a></li>
                </ul>

                <div class="col-md-3 text-end">
                    <a class="btn-custom-primary" href="{{ route('login') }}">Masuk</a>
                    <button type="button" class="btn-custom-transparent">Daftar</button>
                </div>
            </div>
        </div>
    </section>

    {{-- End Navbar --}}


    {{-- Jumbotron --}}

    <div id="main-banner">
        <div id="carouselSlider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselSlider" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselSlider" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselSlider" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($banner as $key => $b)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img class="d-block w-100 carousel-img-height" src="{{ $b->value }}"
                            alt="carousel{{ $key + 1 }}">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselSlider"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselSlider"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    {{-- End Jumbotron --}}



    <br>
    <br>
    <br>
    {{-- <section class="container mt-4 mb-4"> --}}
    <div class="col-lg-10 justify-content-center mx-auto">
        <p class="sub-head py-4">Sambutan Kepala Sekolah</p>

        <div class="container profile-margin">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <img class="infront" src="{{ asset('images/kepsek.jpeg') }}" alt="kepsek">
                </div>
                <div class="col-lg-6">
                    <p class="profile-head1">What is the Best</p>
                    <p class="profile-head2">Method for You ?</p>
                    <p class="profile-sub1">H. Marzuki Miad,M.Pd</p>
                    <p class="profile-sub2">Kepala SMAN 78 Jakarta</p>
                    <p class="profile-desc"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus illo
                        veritatis quod architecto, eum a consequuntur commodi nihil modi odit, maiores assumenda
                        repellat omnis aliquid est necessitatibus libero, dignissimos ut rerum voluptate incidunt
                        velit iusto amet accusamus. Odio aperiam nam distinctio?
                    </p>
                    <span class="text-danger text-sm">Lihat
                        Selengkapnya --></span>
                </div>
            </div>
        </div>
    </div>


    <br>
    <br>
    <br>



    <div class=" py-5 mt-5 bg-light">
        <div class="col-lg-10 justify-content-center mx-auto">


            <div class="row align-items-md-stretch ">
                <div class="col">
                    <div class="row">
                        <div class="col-2">
                            <img class="img-fluid" width="100px"
                                src="https://cdn-icons-png.flaticon.com/512/2641/2641333.png" alt="student">
                        </div>
                        <div class="col">
                            <p class="display-4 text-bold sub-head">1200</p>
                            <h4>Jumlah Peserta Didik</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 text-center">

                    <p class="display-4">120</p>
                    <h5>Kelas X</h5>
                </div>
                <div class="col-lg-2 text-center">

                    <p class="display-4">200</p>
                    <h5>Kelas XI</h5>
                </div>
                <div class="col-lg-2 text-center">

                    <p class="display-4">200</p>
                    <h5>Kelas XII</h5>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>


    <div class="container mt-4 pt-4 col-lg-10">
        <p class="sub-head">Berita Terkini</p>
        <p class="sub-link">Lihat Semua</p>
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <p class="pengumuman-head">Libur Hari Guru Nasional
                        </p>
                        <p class="pengumuman-sub">12 Januari 2022</p>
                        <p class="pengumuman-desc">This is a wider card with supporting text below as a
                            natural lead-in to additional content.</p>
                        <a href="#" class="stretched-link">Lihat Selengkapnya --></a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="pengumuman-img" src="{{ asset('images/carousel/esemka2.jpeg') }}" alt="student">

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <p class="pengumuman-head">Upacara Pengibaran Bendera
                        </p>
                        <p class="pengumuman-sub">12 Januari 2022</p>
                        <p class="pengumuman-desc">This is a wider card with supporting text below as a
                            natural lead-in to additional content.</p>
                        <a href="#" class="stretched-link">Lihat Selengkapnya --></a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="pengumuman-img" src="{{ asset('images/carousel/esemka8.jpeg') }}" alt="student">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>

    <div class="container mt-4 mb-4 col-lg-10">
        <p class="sub-head">Gallery Sekolah</p>
        <p class="sub-link">Lihat Semua</p>
        <div class="col-lg-11  mx-auto">

            <div class="row">
                <div class="col ">
                    <img class="img-gallery img-fluid" src="{{ asset('images/carousel/esemka1.jpeg') }}"
                        alt="kepsek">
                </div>
                <div class="col ">
                    <img class="img-gallery img-fluid" src="{{ asset('images/carousel/esemka2.jpeg') }}"
                        alt="kepsek">
                </div>
                <div class="col ">
                    <img class="img-gallery img-fluid" src="{{ asset('images/carousel/esemka3.jpeg') }}"
                        alt="kepsek">
                </div>
                <div class="col ">
                    <img class="img-gallery img-fluid" src="{{ asset('images/carousel/esemka4.jpeg') }}"
                        alt="kepsek">
                </div>
            </div>
            {{-- <br> --}}
            <div class="row">
                <div class="col ">
                    <img class="img-gallery img-fluid" src="{{ asset('images/carousel/esemka5.jpeg') }}"
                        alt="kepsek">
                </div>
                <div class="col ">
                    <img class="img-gallery img-fluid" src="{{ asset('images/carousel/esemka6.jpeg') }}"
                        alt="kepsek">
                </div>
                <div class="col ">
                    <img class="img-gallery img-fluid" src="{{ asset('images/carousel/esemka7.jpeg') }}"
                        alt="kepsek">
                </div>
                <div class="col ">
                    <img class="img-gallery img-fluid" src="{{ asset('images/carousel/esemka8.jpeg') }}"
                        alt="kepsek">
                </div>
            </div>
        </div>
    </div>


    <br>
    <br>
    <br>
    <div class="container mt-4 mb-4 col-lg-10">
        <p class="sub-head">Pengumuman</p>
        <p class="sub-link">Lihat Semua</p>
        <div class="news-container mb-4 pb-4">
            <div class="row ">
                <div class="col-lg-3" style="margin-right: 50px;">
                    <img class="news-infront"
                        src="https://cdn.undiksha.ac.id/wp-content/uploads/2021/11/27161858/Prestasi-Pencak-Silat.jpeg"
                        alt="kepsek">
                </div>
                <div class="col-lg-6">
                    <p class="news-head">Juara 1 Medali Emas kejuaraan Pencak Silat</p>
                    <p class="news-sub">20 Januari 2022</p>
                    <p class="news-desc"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio ab
                        asperiores cupiditate maiores
                        modi quisquam natus nemo ea, odit in quas nulla dolor quam tempore id, fugiat culpa
                        totam
                        dolorum veritatis minus libero?
                    </p>
                    <span class="text-danger text-sm">Lihat
                        Selengkapnya --></span>
                </div>
            </div>
        </div>
        <div class="news-container">
            <div class="row ">
                <div class="col-lg-3" style="margin-right: 50px;">
                    <img class="news-infront"
                        src="https://cdn.undiksha.ac.id/wp-content/uploads/2021/11/27161858/Prestasi-Pencak-Silat.jpeg"
                        alt="kepsek">
                    <div class="news-behind"></div>
                </div>
                <div class="col-lg-6">
                    <p class="news-head">Juara 1 Medali Emas kejuaraan Pencak Silat</p>
                    <p class="news-sub">20 Januari 2022</p>
                    <p class="news-desc"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio ab
                        asperiores cupiditate maiores
                        modi quisquam natus nemo ea, odit in quas nulla dolor quam tempore id, fugiat culpa
                        totam
                        dolorum veritatis minus libero?
                    </p>
                    <span class="text-danger text-sm">Lihat
                        Selengkapnya --></span>
                </div>
            </div>
        </div>
    </div>


    <br>
    <br>
    <br>
    <footer class="bd-footer py-2 mt-2 bg-light">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-3 mb-3">
                    <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="/"
                        aria-label="Bootstrap">
                        <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt="logo" width="80px">
                        <span class="fs-5">ESEMKA</span>
                    </a>
                    <ul class="list-unstyled small text-muted">
                        <li class="mb-2">Jl. Maulana Yusuf, RT.002/RW.003, Babakan, Kec. Tangerang, Kota Tangerang,
                            Banten 15118</li>
                        <li class="mb-2">Copyright by <a href="https://usefathom.com/ref/ADZSBE" target="_blank"
                                rel="noopener">DigiSupreme</a>.</li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 offset-lg-1 mt-5">
                    <h5>Artikel</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/">Sejarah</a></li>
                        <li class="mb-2"><a href="/docs/5.1/">Visi dan Misi</a></li>
                        <li class="mb-2"><a href="/docs/5.1/examples/">Struktur Organisasi</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mt-5">
                    <h5>Program</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/docs/5.1/getting-started/">E-Learning</a></li>
                        <li class="mb-2"><a href="/docs/5.1/examples/starter-template/">E-KBM</a></li>
                        <li class="mb-2"><a href="/docs/5.1/getting-started/webpack/">E-Point</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mt-5">
                    <h5>SDM</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="https://github.com/twbs/bootstrap">Struktur Organisasi</a></li>
                        <li class="mb-2"><a href="https://github.com/twbs/bootstrap/tree/v4-dev">Semua Guru</a>
                        </li>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mt-5">
                    <h5>Sosial Media</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="https://github.com/twbs/bootstrap/issues">Twitter</a></li>
                        <li class="mb-2"><a href="https://github.com/twbs/bootstrap/discussions">Instagram</a>
                        </li>
                        <li class="mb-2"><a href="https://github.com/sponsors/twbs">Facebook</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

<script>
    $(document).ready(function() {
        $('#menu-button').click(function() {
            $('header nav').slideToggle('slow', function() {
                $(this).toggleClass('showMenu');
            });
        });
    });
</script>

</html>
