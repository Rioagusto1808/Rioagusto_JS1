<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Layanan Informasi</title>
        <style>
            .visi-misi-fullwidth {
                width: 100%;
                height: 300px;
                margin: 0;
                padding: 0;
                object-fit: cover;
            }

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
            /* Header styling */
            .form-header {
                text-align: center;
                padding: 40px 20px;
                background-color: white;
                color: black;
                border-radius: 8px;
                margin-bottom: 20px;
            }

            .form-header h2 {
                margin: 0;
                font-size: 28px;
            }

            .form-header p {
                margin: 10px 0 0;
                font-size: 16px;
            }

            .mb-3 {
                margin-bottom: 20px;
            }

            label.form-label {
                font-weight: 600;
                font-size: 16px;
                color: #555;
            }

            .form-control {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 8px;
                font-size: 14px;
                background-color: #f8f8f8;
                transition: border-color 0.3s ease;
            }

            .form-control:focus {
                border-color: #007bff;
                background-color: #fff;
                outline: none;
            }

            textarea.form-control {
                resize: none;
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
                    LAYANAN INFORMASI
                </div>
            </div>

            <!-- Content Wrapper -->
            <div class="content-wrapper">
                <!-- Main Content -->
                <x-message></x-message>
                <div class="main-content">
                    <div class="row gy-4">
                        <div class="form-header">
                            <div style="text-align: left">
                                <p>
                                    Layanan Informasi Sekolah adalah wadah
                                    komunikasi atau konsultasi permasalahan
                                    sekolah untuk membantu siswa/siswi dan orang
                                    tua dalam penyelesaian permasalahan sekolah
                                    baik akademik maupun non akademik.
                                </p>
                                <p>
                                    Layanan ini juga dapat dimanfaatkan oleh
                                    berbagai macam kalangan yang berkaita dengan
                                    SD N Peraduan Waras
                                </p>
                                <p>
                                    Setiap pertanyaan akan dijawab/dibalas
                                    melalui email.
                                </p>
                            </div>
                        </div>
                        <form
                            action="{{ route('pengaduan.store') }}"
                            method="POST"
                        >
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    Email
                                </label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Masukkan email Anda"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="alasan" class="form-label">
                                    Isi Pesan
                                </label>
                                <textarea
                                    class="form-control"
                                    id="alasan"
                                    name="alasan"
                                    rows="5"
                                    placeholder="Tulis pesan Anda di sini..."
                                    required
                                ></textarea>
                            </div>
                            <button
                                type="submit"
                                class="btn btn-customs text-white"
                                style="background-color: #007bff; width: 10%"
                            >
                                Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
                <div class="right-bar">
                    @include('landingpages.components.Bar', ['berita' => $berita])
                </div>
            </div>
        @endsection
    </body>
</html>
