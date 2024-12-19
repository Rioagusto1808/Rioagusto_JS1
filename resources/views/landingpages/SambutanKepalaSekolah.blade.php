<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Sambutan Kepala Sekolah</title>
        <style>
            .visi-misi-fullwidth {
                width: 100%;
                height: 300px;
                margin: 0;
                padding: 0;
                object-fit: cover;
            }

            .visi-misi-wrapper {
                position: relative;
                text-align: center;
                color: white;
            }

            .visi-misi-title {
                position: absolute;
                top: 60%;
                left: 10%; /* Posisikan dekat sisi kiri layar */
                transform: translateY(-50%);
                font-size: 40px;
                font-family: 'Montserrat', sans-serif; /* Font modern */
                font-weight: bold;
                color: transparent; /* Transparan untuk gradien pada teks */
                background: linear-gradient(
                    90deg,
                    #007bff,
                    #0056b3,
                    #00c6ff
                ); /* Gradien warna biru */
                background-clip: text; /* Gradien hanya pada teks */
                -webkit-background-clip: text; /* Untuk browser berbasis WebKit */
                text-shadow: 2px 4px 6px rgba(0, 0, 0, 0.4); /* Bayangan pada teks */
                text-transform: uppercase;
                letter-spacing: 5px; /* Memberikan ruang antar huruf */
                display: flex;
                align-items: center;
                animation: glow 1.5s ease-in-out infinite; /* Animasi cahaya lembut */
            }

            .visi-misi-title .pipe {
                color: #007bff; /* Warna biru terang */
                margin-top: -10px;
                font-size: 30px; /* Sesuaikan ukuran garis dengan ukuran teks */
                margin-right: 10px; /* Jarak antara garis dan teks */
                animation: fadePipe 1.5s ease-in-out infinite;
            }

            /* Animasi cahaya pada teks */
            @keyframes glow {
                0%,
                100% {
                    text-shadow:
                        2px 4px 6px rgba(0, 0, 0, 0.4),
                        0 0 20px rgba(0, 123, 255, 0.8),
                        0 0 30px rgba(0, 198, 255, 0.6);
                }
                50% {
                    text-shadow:
                        2px 4px 6px rgba(0, 0, 0, 0.4),
                        0 0 25px rgba(0, 123, 255, 1),
                        0 0 40px rgba(0, 198, 255, 0.8);
                }
            }

            /* Animasi untuk garis vertikal */
            @keyframes fadePipe {
                0%,
                100% {
                    color: rgba(0, 123, 255, 1);
                }
                50% {
                    color: rgba(0, 123, 255, 0.6);
                }
            }

            .content-wrapper {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                gap: 20px;
                margin: 20px;
            }

            .main-content {
                flex: 3;
                background-color: #ffffff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .right-bar {
                flex: 1;
                background-color: #f8f9fa;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                position: sticky;
                top: 20px;
                min-height: 600px;
            }

            .card-img-top {
                object-fit: cover;
                width: 100%;
                height: 200px;
            }

            /* Media Queries for responsiveness */
            @media (max-width: 768px) {
                .content-wrapper {
                    flex-direction: column;
                    gap: 10px;
                }
                .visi-misi-title {
                    font-size: 20px;
                }
                .visi-misi-title .pipe {
                    font-size: 20px;
                }
                .main-content,
                .right-bar {
                    flex: none;
                    width: 100%;
                }

                .right-bar {
                    min-height: auto;
                }
            }
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
        </style>
    </head>
    <body>
        @extends('landingpages.layouts')

        @section('content')
            <!-- Wrapper for image and text -->
            <div class="visi-misi-wrapper">
                <img
                    src="{{ asset('images/Carousel1.jpg') }}"
                    alt="Visi Misi"
                    class="visi-misi-fullwidth"
                />
                <!-- Text on top of image -->
                <div class="visi-misi-title">
                    <span class="pipe">|</span>
                    SAMBUTAN KEPALA SEKOLAH
                </div>
            </div>

            <!-- Content Wrapper -->
            <div class="content-wrapper">
                <!-- Main Content -->
                <div class="main-content">
                    <div class="row gy-4">
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
                                    <h2
                                        class="fw-bold"
                                        style="
                                            font-size: 30px;
                                            color: rgb(0, 92, 224);
                                        "
                                    >
                                        SAMBUTAN KEPALA SEKOLAH
                                    </h2>
                                    <p
                                        style="
                                            font-size: 15px;
                                            text-align: justify;
                                        "
                                    >
                                        Selamat datang di website Sistem
                                        Informasi Akademik yang saya tujukan
                                        untuk seluruh unsur pimpinan, guru,
                                        karyawan dan siswa serta khalayak umum
                                        guna dapat mengakses seluruh informasi
                                        tentang sekolah kami. Tentunya dalam
                                        penyajian informasi masih banyak
                                        kekurangan, oleh karena itu kepada
                                        seluruh civitas akademika dan masyarakat
                                        umum dapat memberikan saran dan kritik
                                        demi kemajuan lebih lanjut.
                                    </p>
                                    <p
                                        style="
                                            font-size: 15px;
                                            text-align: justify;
                                        "
                                    >
                                        Saya berharap Website ini dapat
                                        dijadikan wahana interaksi yang positif
                                        baik antar civitas akademika maupun
                                        masyarakat pada umumnya, sehingga dapat
                                        menjalin silaturahmi yang erat disegala
                                        unsur. Mari kita bekerja dan berkarya
                                        dengan mengharap ridho sang Kuasa dan
                                        keikhlasan yang tulus demi anak bangsa.
                                    </p>

                                    <p class="fw-bold fst-italic">
                                        – Desna indasari
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar on the right -->
                <div class="right-bar">
                    @include('landingpages.components.Bar', ['berita' => $berita])
                </div>
            </div>
        @endsection
    </body>
</html>
