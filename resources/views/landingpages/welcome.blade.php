<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>SIAK SD</title>
        <!-- Include Bootstrap CSS -->
    </head>
    <body>
    <audio id="background-audio" autoplay loop muted>
    <source src="{{ asset('videos/backsound.mp3') }}" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const audio = document.getElementById('background-audio');
        // Unmute audio setelah autoplay dimulai
        audio.muted = false;
        audio.play().catch(error => {
            console.error('Autoplay gagal:', error);
        });
    });
</script>





        @extends('landingpages.layouts')
        @section('content')
            <!-- Carousel -->
            <div
                id="myCarousel"
                class="carousel slide"
                data-ride="carousel"
                data-interval="3000"
            >
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li
                        data-target="#myCarousel"
                        data-slide-to="0"
                        class="active"
                    ></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="item active">
                        <img
                            src="{{ asset('images/Carousel1.jpg') }}"
                            alt="Slide 1"
                            class="img-responsive w-100"
                        />
                    </div>
                    <!-- Slide 2 -->
                    <div class="item">
                        <img
                            src="{{ asset('images/Carousel2.jpg') }}"
                            alt="Slide 2"
                            class="img-responsive w-100"
                        />
                    </div>
                    <!-- Slide 3 -->
                    <div class="item">
                        <img
                            src="{{ asset('images/Carousel3.jpg') }}"
                            alt="Slide 3"
                            class="img-responsive w-100"
                        />
                    </div>
                </div>

                <!-- Shared Text for All Slides -->
                <div class="carousel-caption animated-text">
    <h3 id="caption-title">
        Selamat Datang di Sistem Informasi Akademik
    </h3>
    <p id="caption-description">
        SD Negeri Peraduan Waras - Bersama Mewujudkan Generasi Cemerlang
    </p>
</div>


                <!-- Left and right controls -->
                <a
                    class="left carousel-control"
                    href="#myCarousel"
                    data-slide="prev"
                >
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a
                    class="right carousel-control"
                    href="#myCarousel"
                    data-slide="next"
                >
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>

            <!-- Sambutan Kepala Sekolah -->
            <div class="container my-5">
                <div class="row align-items-center">
                    <div class="col-md-4 text-center">
                        <div class="hexagon-container">
                            <div>
                                <img
                                    src="{{ asset('images/Kepala_Sekolah.png') }}"
                                    alt="Kepala Sekolah"
                                    class="img-fluid"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h2 class="fw-bold" style="font-size: 50px; color:rgb(0, 92, 224);">
                            SAMBUTAN KEPALA SEKOLAH
                        </h2>
                        <p style="font-size: 15px">
                            Selamat datang di website Sistem Informasi Akademik
                            yang saya tujukan untuk seluruh unsur pimpinan,
                            guru, karyawan dan siswa serta khalayak umum guna
                            dapat mengakses seluruh informasi tentang sekolah
                            kami. Tentunya dalam penyajian informasi masih
                            banyak kekurangan, oleh karena itu kepada seluruh
                            civitas akademika dan masyarakat umum dapat
                            memberikan saran dan kritik demi kemajuan lebih
                            lanjut.
                        </p>
                        <p style="font-size: 15px">
                            Saya berharap Website ini dapat dijadikan wahana
                            interaksi yang positif baik antar civitas akademika
                            maupun masyarakat pada umumnya, sehingga dapat
                            menjalin silaturahmi yang erat disegala unsur. Mari
                            kita bekerja dan berkarya dengan mengharap ridho
                            sang Kuasa dan keikhlasan yang tulus demi anak
                            bangsa.
                        </p>
                        <p class="fw-bold fst-italic">– Desna indasari</p>
                    </div>
                </div>
            </div>

            <!-- Tabel Statistik dengan Flexbox untuk Penataan Horizontal -->
            <div class="statistik-view text-center">
                <div class="row justify-content-center">
                    <div class="col-md-2 col-sm-4 col-6 statistik-item">
                        <h2 class="counter" data-target="69">69</h2>
                        <p>Total Siswa</p>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 statistik-item">
                        <h2 class="counter" data-target="2617">2617</h2>
                        <p>Guru/Tendik</p>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 statistik-item">
                        <h2 class="counter" data-target="3190">3190</h2>
                        <p>Total Kelas</p>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 statistik-item">
                        <h2 class="counter" data-target="3190">3190</h2>
                        <p>Alumni</p>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 statistik-item">
                        <h2 class="counter" data-target="2442">2442</h2>
                        <p>Pengunjung</p>
                    </div>
                </div>
            </div>

            <!-- Profile SD -->
            <div class="container my-5">
                <div class="title-section">
                    <h2 style="font-size: 35px" class="fw-bold">
                        PROFIL SD Negeri Peraduan Waras
                    </h2>
                    <p>Yuk lihat video profil SD Negeri Peraduan Waras</p>
                    <hr
                        style="
                            width: 60px;
                            border: 2px solid black;
                            margin: auto;
                        "
                    />
                </div>

                <div class="laptop-frame">
                    <img
                        src="{{ asset('images/laptop_frame.png') }}"
                        alt="Laptop Frame"
                    />
                    <div class="video-container">
                        <iframe
                            src="https://www.youtube.com/embed/nTwqjhRxrnE"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                        ></iframe>
                    </div>
                </div>
            </div>

            <!-- Galeri Foto -->
            <div class="container gallery-section">
                <h2 style="font-size: 35px">Galeri Foto</h2>
                <div class="row g-4">
                @foreach($galeri as $berita)
    <div class="col-md-3 col-6 gx-3">
        <a href="{{ route('image.show', $berita->file->id) }}">
        <img
            src="{{ route('image.show', $berita->file->id) }}"
            alt="Foto 1"
            class="img-fluid gallery-img"
            style="width: 300px; height: 250px; object-fit: cover; border-radius:5px;"
        />
        </a>
    </div>
@endforeach

                </div>
                <a
                    href="/full-galeri"
                    class="btn btn-primary view-more-btn custom-width"
                >
                    Lihat Semua
                </a>
            </div>

            <div class="container news-section px-3">
    <h2 class="text-center mb-4" style="font-size: 35px;">Berita Terbaru</h2>
    <div class="row g-4 gx-3">
        <!-- Iterasi Berita -->
        @foreach($beritaTerbaru as $berita)
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="card news-card h-100 shadow-sm">
                <!-- Gambar -->
                <img
                    src="{{ route('image.show', $berita->file->id) }}"
                    alt="{{ $berita->judul }}"
                    class="card-img-top news-img"
                    style="object-fit: cover; height: 200px;"
                />
                <!-- Konten -->
                <div class="card-body d-flex flex-column">
                    <h5 class="news-title text-truncate">{{ $berita->judul }}</h5>
                    <p class="news-content text-truncate">
                        {{ Str::limit($berita->content, 100) }}
                    </p>
                    <div class="mt-auto">
                        <a href="{{ route("berita_id.show", $berita) }}" class="btn btn-primary btn-sm btn-read-more w-100">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


            <!-- Custom CSS -->
            <style>
                /* Lebar Full Carousel */
                .carousel-inner > .item > img {
                    width: 100%;
                    height: auto;
                }

                /* Memastikan Tinggi Caraousel Responsive */
                .carousel {
                    position: relative;
                    overflow: hidden;
                    width: 100%;
                    max-height: 640px;
                }

                /* Mengatur indikator carousel agar berada di tengah */
                .carousel-indicators {
                    bottom: 10px;
                    left: 50%;
                    transform: translateX(-50%);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    padding: 0;
                    margin: 0;
                }

                /* Menyesuaikan margin antar indikator */
                .carousel-indicators li {
                    margin: 0 5px;
                }

                /* Styiling Sambutan Kepala Sekolah */
                .hexagon-container {
                    position: relative;
                    max-width: 500px;
                    margin: 0 auto;
                }

                /* Tampilan Statistik */
                .statistik-view {
                    background-image: url('{{ asset('images/GambarAnakSekolah.png') }}');
                    background-size: cover; /* Memastikan gambar menutupi seluruh area */
                    background-position: center;
                    background-repeat: no-repeat;
                    height: 580px;
                    width: 100%;
                    display: flex;
                    justify-content: center;
                    flex-direction: column;
                    text-align: center;
                    padding: 20px;
                    box-sizing: border-box;
                    color: white;
                }

                .statistik-item h2 {
                    font-size: 40px; /* Ukuran angka statistik */
                    font-weight: bold;
                    color: white;
                }

                .statistik-item p {
                    font-size: 18px;
                    color: white;
                    margin-top: 10px;
                }

                /* frame Laptop */
                .laptop-frame {
                    max-width: 700px;
                    margin: 0 auto;
                    position: relative;
                }

                .laptop-frame img {
                    width: 100%;
                    display: block;
                }

                .video-container {
                    border-radius:;
                    position: absolute;
                    top: 15%;
                    left: 16%;
                    width: 68%;
                    height: 44%;
                }

                .video-container iframe {
                    width: 100%;
                    height: 100%;
                    border-radius: 5px;
                }

                .title-section {
                    text-align: center;
                    font-size: 15px;
                }

                /* Galeri Foto */
                .gallery-img {
                    height: 250px;
                    object-fit: cover;
                    transition: transform 0.3s ease;
                }

                .gallery-img:hover {
                    transform: scale(1.05);
                }

                .gallery-section {
                    padding: 50px 0;
                }

                .gallery-section h2 {
                    text-align: center;
                    font-weight: bold;
                    margin-bottom: 30px;
                }
                .custom-width {
                    width: 120px;
                    display: block;
                    text-align: center;
                    margin: 30px auto 0;
                }

                /* Berita Content */
                .news-section {
                    padding: 50px 0;
                }

                .news-card {
                    height: 100%;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    transition: transform 0.3s ease;
                }

                .news-card:hover {
                    transform: translateY(-5px);
                }

                .news-img {
                    height: 180px;
                    object-fit: cover;
                }

                .news-title {
                    font-size: 1.25rem;
                    font-weight: bold;
                    margin: 15px 0;
                }

                .news-content {
                    font-size: 0.95rem;
                    color: #555;
                }

                .btn-read-more {
                    display: inline-block;
                    margin-top: 15px;
                }

                /* Styling Carousel Caption */
                .carousel-caption {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    text-align: center;
                    z-index: 10;
                }

                /* Animasi untuk teks */
                @keyframes fadeInText {
                    0% {
                        opacity: 0;
                        transform: translateY(30px);
                    }
                    100% {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                /* Animasi untuk perubahan warna teks */
                @keyframes changeTextColor {
                    0% {
                        color: #fff; /* Warna awal putih */
                    }
                    50% {
                        color: rgb(0, 92, 224); /* Warna kedua (merah oranye) */
                    }
                    100% {
                        color: #fff; /* Warna akhir putih */
                    }
                }

                /* Styling untuk teks dengan animasi fade-in dan perubahan warna */
                .animated-text h3,
                .animated-text p {
                    opacity: 0; /* Teks disembunyikan saat pertama kali */
                    animation:
                        fadeInText 2s ease-in-out forwards,
                        changeTextColor 5s ease-in-out infinite; /* Animasi fade-in dan perubahan warna */
                    font-size: 2rem; /* Ukuran teks */
                    font-weight: bold;
                    transition: color 1s ease-in-out; /* Transisi warna yang lebih halus */
                }

                /* Tampilkan teks saat slide pertama */
                .item.active ~ .carousel-caption h3,
                .item.active ~ .carousel-caption p {
                    opacity: 1;
                    animation: fadeInText 2s ease-in-out forwards; /* Animasi fade-in saat slide pertama aktif */
                }
                #caption-title {
        font-size: 40px; /* Ukuran default untuk desktop */
    }

    #caption-description {
        font-size: 20px; /* Ukuran default untuk desktop */
    }

    @media (max-width: 576px) {
        #caption-title {
            font-size: 15px;
        }

        #caption-description {
            font-size: 8px; /* Ukuran lebih kecil untuk layar mobile */
        }
    }
            </style>
            <script>
                $(document).ready(function () {
                    // Menunggu carousel selesai dimuat
                    $('#myCarousel').on('slid.bs.carousel', function (e) {
                        // Menyembunyikan teks di slide yang tidak aktif
                        $('.carousel-caption h3, .carousel-caption p').css({
                            opacity: '0',
                            transform: 'translateY(30px)', // Menyembunyikan teks dengan animasi
                        });

                        // Menampilkan teks hanya di slide aktif
                        const currentIndex = $(e.relatedTarget).index();
                        $('.carousel-caption')
                            .eq(currentIndex)
                            .find('h3, p')
                            .css({
                                opacity: '1',
                                transform: 'translateY(0)', // Menampilkan teks dengan animasi
                            });
                    });

                    // Pastikan teks muncul langsung di slide pertama saat halaman pertama kali dimuat
                    $('.carousel-caption h3, .carousel-caption p').eq(0).css({
                        opacity: '1',
                        transform: 'translateY(0)',
                    });
                });
            </script>

            <!-- Include Bootstrap JS and jQuery -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        @endsection
    </body>
</html>
