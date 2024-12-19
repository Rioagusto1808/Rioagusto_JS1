<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Data Siswa</title>
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
            /* Styling Container Visi Misi */
            .visi-misi-content {
                background-color: #fff; /* Warna latar belakang lembut */
                padding: 30px;
                border-radius: 10px;
                line-height: 1.8; /* Spasi antar baris */
                color: #333; /* Warna teks */
                margin-top: 20px;
            }

            /* Judul Visi dan Misi */
            .visi-misi-content h1,
            .visi-misi-content h2 {
                font-family: 'Montserrat', sans-serif;
                font-weight: bold;
                text-transform: uppercase;
                color: #007bff; /* Warna biru */
                border-left: 5px solid #007bff; /* Garis dekoratif di kiri judul */
                padding-left: 10px; /* Jarak teks dari garis */
                margin-bottom: 15px;
            }

            /* List atau Poin Visi */
            .visi-misi-content p {
                font-size: 16px;
                color: #555;
                margin: 5px 0 10px 15px;
                position: relative;
            }

            /* Responsif Visi Misi */
            @media (max-width: 768px) {
                .visi-misi-content {
                    padding: 20px;
                }
                .visi-misi-content h1,
                .visi-misi-content h2 {
                    font-size: 18px;
                }
                .visi-misi-content p {
                    font-size: 14px;
                }
            }

            .table tbody td {
                color: #333; /* Warna teks gelap yang kontras */
            }

            /* Menambahkan efek hover yang tidak mengubah warna teks */
            .table tbody tr:hover {
                background-color: #f8f9fa; /* Warna latar belakang yang lebih terang saat hover */
            }

            /* Jika ada efek hover yang mengubah warna teks, pastikan teks tetap kontras */
            .table tbody tr:hover td {
                color: #333; /* Tetap menggunakan warna teks yang gelap saat hover */
            }

            /* Menangani kondisi ketika baris tabel terpilih */
            .table tbody tr.selected td {
                background-color: #007bff; /* Contoh warna latar belakang terpilih */
                color: white; /* Warna teks putih ketika terpilih */
            }
            .search-form {
                display: flex;
                justify-content: left;
                align-items: center;
                gap: 10px; /* Jarak antar elemen */
                margin: 5px;
                width: 100%;
            }

            .search-input {
                width: 30%;
                padding: 10px;
                font-size: 10px;
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
                font-size: 10px;
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
                    DATA SISWA
                </div>
            </div>

            <!-- Content Wrapper -->
            <div class="content-wrapper">
                <!-- Main Content -->
                <div class="main-content">
                    <div class="row gy-4">
                        <div>
                            <div class="visi-misi-content">
                                <h1>
                                    Data Siswa/Siswi Sekolah Dasar Negeri
                                    Peraduan Waras
                                </h1>
                                <form
                                    action="{{ route('DataSiswa') }}"
                                    method="GET"
                                    class="search-form"
                                >
                                    <input
                                        type="text"
                                        name="search"
                                        value="{{ request()->search }}"
                                        placeholder="Cari berdasarkan Nama Dan NISN"
                                        class="search-input"
                                    />
                                    <select
                                        name="kelas_id"
                                        class="search-input"
                                        style="max-width: 200px"
                                    >
                                        <option value="">Semua Kelas</option>
                                        @foreach ($kelasList as $kelas)
                                            <option
                                                value="{{ $kelas->id }}"
                                                {{ request('kelas_id') == $kelas->id ? 'selected' : '' }}
                                            >
                                                {{ $kelas->tingkat }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="search-button">
                                        Cari
                                    </button>
                                </form>
                                @if ($siswa->isEmpty())
                                    <p class="text-left">
                                        Data Tidak Ditemukan
                                    </p>
                                @endif

                                <div class="table-responsive">
                                    <table
                                        class="table table-hover table-bordered table-striped table-sm shadow-sm rounded-3"
                                    >
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>NIS/NISN</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>Tahun Masuk</th>
                                                <th>Tahun Lulus</th>
                                                <th>kelas</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($siswa->isNotEmpty())
                                                @foreach ($siswa as $index => $item)
                                                    <tr>
                                                        <td>
                                                            {{ $siswa->firstItem() + $index }}
                                                        </td>
                                                        <td>
                                                            {{ $item->nama }}
                                                        </td>
                                                        <td>
                                                            {{ $item->nis }}
                                                        </td>
                                                        <td>
                                                            {{ $item->tempat_lahir }}
                                                        </td>
                                                        <td>
                                                            {{ $item->tanggal_lahir }}
                                                        </td>
                                                        <td>
                                                            {{ $item->alamat }}
                                                        </td>
                                                        <td>
                                                            {{ $item->tahun_masuk }}
                                                        </td>
                                                        <td>
                                                            {{ $item->tahun_lulus ?? '-' }}
                                                        </td>
                                                        <td>
                                                            {{ $item->kelas->tingkat }}
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge @if ($item->status == 'lulus') bg-success @elseif ($item->status == 'belum lulus') bg-warning @else bg-danger @endif"
                                                            >
                                                                {{ ucfirst($item->status) }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <!-- Jika tidak ada data, tampilkan pesan di seluruh kolom tabel -->
                                                <tr>
                                                    <td
                                                        colspan="10"
                                                        class="text-center"
                                                    >
                                                        Tidak ada data siswa
                                                        ditemukan
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-bar">
                    @include('landingpages.components.Bar', ['berita' => $berita])
                </div>
            </div>
        @endsection
    </body>
</html>
