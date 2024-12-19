<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    background: linear-gradient(90deg, #007bff, #0056b3, #00c6ff); /* Gradien warna biru */
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
    0%, 100% {
        text-shadow: 2px 4px 6px rgba(0, 0, 0, 0.4), 
                     0 0 20px rgba(0, 123, 255, 0.8), 
                     0 0 30px rgba(0, 198, 255, 0.6);
    }
    50% {
        text-shadow: 2px 4px 6px rgba(0, 0, 0, 0.4), 
                     0 0 25px rgba(0, 123, 255, 1), 
                     0 0 40px rgba(0, 198, 255, 0.8);
    }
}

/* Animasi untuk garis vertikal */
@keyframes fadePipe {
    0%, 100% {
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
            max-height: 550px;
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
/* Gaya untuk Judul Berita */
.news-title {
    font-family: 'Montserrat', sans-serif;
    font-weight: bold;
    font-size: 2.5rem;
    text-align: center;
    text-transform: uppercase;
    color: transparent;
    background: linear-gradient(90deg, rgba(0, 123, 255, 1), rgba(0, 198, 255, 0.8));
    background-clip: text;
    -webkit-background-clip: text;
    text-shadow: 2px 4px 6px rgba(0, 0, 0, 0.2);
    letter-spacing: 2px;
    margin-bottom: 20px;
}

/* Gaya untuk Meta Informasi (Admin dan Tanggal) */
.news-meta {
    font-family: 'Open Sans', sans-serif;
    font-size: 1rem;
    color: #6c757d;
    text-align: center;
    margin-bottom: 20px;
}

/* Gaya untuk Badge Status */
.badge {
    padding: 5px 10px;
    border-radius: 10px;
    font-size: 0.9rem;
    font-weight: bold;
    
}

/* Menambahkan padding dan batas maksimal lebar untuk konten */
.content-container {    /* Jarak dari tepi kontainer */
    font-size: 18px;   /* Ukuran font untuk teks */
    line-height: 1.6;  /* Jarak antar baris */
    margin-left: auto;
    margin-right: auto;
    margin-top: -40px;
}

.content-container p {
    margin-bottom: 20px; /* Jarak antar paragraf */
    text-align: justify; /* Teks teratur di kedua sisi */
}
.content-container {
    white-space: pre-wrap; /* Menangani spasi dan enter */
}

/* Menyesuaikan dengan lebar layar kecil */
@media (max-width: 768px) {
    .content-container {
        padding: 15px; /* Menambahkan padding lebih kecil pada layar kecil */
        max-width: 100%; /* Menggunakan 100% lebar pada layar kecil */
    }
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
  background-color: #ffffff;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
           <span class="pipe">|</span> BERITA
        </div>
    </div>

    <div class="content-wrapper">
    <!-- Main Content -->
    <div class="main-content">
        <div class="row gy-4">
            <!-- Gambar Sampul -->
            @if ($berita->file)
            <div class="mb-4">
    <div class="text-center">
        <img
            src="{{ route('image.show', $berita->file->id) }}"
            alt="Gambar Sampul"
            class="img-fluid rounded shadow-sm"
            style="max-width: 100%; height:400px"
        />
    </div>
</div>

            @else
                <div class="alert alert-warning">
                    Tidak ada gambar tersedia.
                </div>
            @endif
            <!-- Judul Berita -->
            

         <!-- Admin Upload dan Tanggal Upload -->
<div class="news-meta mb-3">
    <h1 class="news-title mb-4">{{ $berita->judul }}</h1>

    <div class="meta-info mb-2" style="font-size: 15px;">
    <i class="bi bi-person-fill"></i> {{ $berita->user->name }} |
    <i class="bi bi-calendar-date"></i> {{ $berita->created_at->diffForHumans() }}

    </div>
    <!-- Kontainer untuk Konten -->
    <div class="content-container">
        <p class="text-muted" style="font-size: 18px;">{{ $berita->content }}</p>
    </div>
</div>



            
        </div>
    </div>
<div class="right-bar">
    <div class="container-wrapper">
    <!-- Sidebar Component -->
    <div class="right-container">
      <div class="search-bar">
        <input type="text" placeholder="Search news...">
        <button type="button">
          <i class="bi bi-search"></i>
        </button>
      </div>
      @foreach($beritas as $item)
      <a href="{{ route("berita_id.show", $item->id) }}" >
      <div class="news-content">
        <div class="news-item">
          <img src="{{ route('image.show', $item->file->id) }}" 
          alt="Main Content Image"
          class="card-img-top"
          style="object-fit: cover; border-radius:5px;"
          >
          <div>
            <h6>{{ $item->judul }}</h6>
            <p>{{ Str::limit($item->content, 200) }}</p>
          </div>
        </div>
      </div>
      </a>
      @endforeach
    </div>
  </div>
</div>
</div>

    
    @endsection
</body>
</html>
