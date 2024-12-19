<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Berita</title>
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
            .search-form {
                display: flex;
                justify-content: left;
                align-items: center;
                gap: 10px; /* Jarak antar elemen */
                margin: 20px auto;
                max-width: 600px; /* Membatasi lebar form */
            }

            .search-input {
                width: 15%;
                padding: 10px;
                font-size: 16px;
                border: 2px solid #007bff; /* Warna border biru */
                border-radius: 25px;
                outline: none;
                box-sizing: border-box; /* Memastikan padding dan border tidak mengubah ukuran input */
                transition: border-color 0.3s ease-in-out; /* Transisi pada border */
            }

            .search-input:focus {
                border-color: #0056b3; /* Warna border berubah saat fokus */
            }

            .search-button {
                padding: 10px 20px;
                font-size: 16px;
                background-color: #007bff; /* Warna latar belakang biru */
                color: white;
                border: none;
                border-radius: 25px;
                cursor: pointer;
                transition: background-color 0.3s ease-in-out;
            }

            .search-button:hover {
                background-color: #0056b3; /* Warna latar belakang berubah saat hover */
            }

            .search-button:active {
                background-color: #004085; /* Warna saat tombol ditekan */
            }

            @media (max-width: 768px) {
                .search-form {
                    flex-direction: column;
                    gap: 10px;
                }

                .search-input {
                    width: 100%;
                }

                .search-button {
                    width: 100%;
                }
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
                    BERITA
                </div>
            </div>

            <!-- Content Wrapper -->
            <div class="content-wrapper">
                <!-- Main Content -->
                <div class="main-content">
                    <div class="row gy-4">
                        <form
                            action="{{ route('berita_all.index') }}"
                            method="GET"
                            class="search-form"
                        >
                            <input
                                type="text"
                                name="search"
                                value="{{ request()->search }}"
                                placeholder="Cari berdasarkan judul"
                                class="search-input"
                            />
                            <button type="submit" class="search-button">
                                Cari
                            </button>
                        </form>
                        @if ($berita->isEmpty())
                            <p class="text-left">
                                Tidak ada judul ditemukan dengan "
                                <strong>{{ request('search') ?? '' }}</strong>
                                "
                            </p>
                        @endif

                        <!-- News Card 1 -->
                        @foreach ($berita as $item)
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="card news-card h-100 shadow-sm">
                                    <!-- Image Placeholder -->
                                    <a
                                        href="{{ route('image.show', $item->file->id) }}"
                                    >
                                        <img
                                            src="{{ route('image.show', $item->file->id) }}"
                                            alt="Main Content Image"
                                            class="card-img-top"
                                            style="
                                                object-fit: cover;
                                                border-radius: 5px;
                                            "
                                        />
                                    </a>
                                    <!-- Content -->
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="news-title text-truncate">
                                            {{ $item->judul }}
                                        </h5>
                                        <p class="news-content text-truncate">
                                            {{ Str::limit($item->content, 100) }}
                                        </p>
                                        <div class="mt-auto">
                                            <a
                                                href="{{ route('berita_id.show', $item->id) }}"
                                                class="btn btn-primary btn-sm btn-read-more w-100"
                                            >
                                                Baca Selengkapnya
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Add more news items as necessary. They will automatically flow into the next row. -->
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $berita->links() }}
                    </div>
                </div>
            </div>
        @endsection
    </body>
</html>
