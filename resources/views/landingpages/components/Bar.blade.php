<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Responsive Sidebar Component</title>
        <style>
            body {
                margin: 0;
                font-family: Arial, sans-serif;
                background-color: #f8f9fa;
            }

            .container-wrapper {
                display: flex;
                justify-content: space-between; /* Mengatur elemen agar berjauhan */
                align-items: flex-start; /* Agar sidebar dan konten utama sejajar di atas */
                padding: 20px;
            }

            .right-container {
                width: 350px; /* Lebar sidebar */
                margin-left: 20px; /* Jarak antara konten utama dan sidebar */
                border-radius: 10px;
                overflow: hidden;
            }

            .search-bar {
                display: flex;
                align-items: center;
                padding: 10px;
                background-color: #ffffff;
                border-bottom: 1px solid #ddd;
            }

            .search-bar input {
                border: none;
                outline: none;
                padding: 10px;
                flex-grow: 1;
                font-size: 0.9rem;
                color: #495057;
            }

            .search-bar button {
                border: none;
                background-color: transparent;
                color: #495057;
                cursor: pointer;
                padding: 5px 10px;
                font-size: 1.2rem;
            }

            .search-bar button:hover {
                color: #007bff;
            }

            .news-content {
                padding: 10px;
                max-height: 400px;
                overflow-y: auto;
            }

            .news-item {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 10px;
                padding-bottom: 10px;
                border-bottom: 1px solid #f1f1f1;
            }

            .news-item img {
                width: 80px;
                height: 60px;
                object-fit: cover;
                border-radius: 5px;
            }

            .news-item h6 {
                margin: 0;
                font-size: 0.9rem;
                color: #343a40;
                font-weight: 600;
            }

            .news-item p {
                margin: 0;
                font-size: 0.8rem;
                color: #6c757d;
            }

            @media (min-width: 992px) {
                .right-container {
                    position: relative; /* Jangan fixed */
                    margin: 20px; /* Atur margin */
                }

                .main-content {
                    margin-right: 0; /* Pastikan konten utama tidak terdorong */
                }
            }

            @media (max-width: 991px) {
                .right-container {
                    width: 100%;
                    margin: 20px 0;
                    border-radius: 0;
                }
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
                width: 100%;
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
        <div class="container-wrapper">
            <!-- Sidebar Component -->
            <div class="right-container">
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
                    <button type="submit" class="search-button">Cari</button>
                </form>
                @foreach ($berita as $item)
                    <a href="{{ route('berita_id.show', $item->id) }}">
                        <div class="news-content">
                            <div class="news-item">
                                <img
                                    src="{{ route('image.show', $item->file->id) }}"
                                    alt="Main Content Image"
                                    class="card-img-top"
                                    style="
                                        object-fit: cover;
                                        border-radius: 5px;
                                    "
                                />
                                <div>
                                    <h6>{{ $item->judul }}</h6>
                                    <p>
                                        {{ Str::limit($item->content, 200) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </body>
</html>
