<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fasilitas</title>
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
            .visi-misi-title{
                font-size: 20px;
            }
.visi-misi-title .pipe{
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
        <span class="pipe">|</span> FASILITAS
        </div>
    </div>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Main Content -->
        <div class="main-content">
            <div class="row gy-4">
                <!-- News Card 1 -->
               


                <!-- Add more news items as necessary. They will automatically flow into the next row. -->
            </div>

        </div>
       
        <!-- Sidebar on the right -->
        <div class="right-bar">
            @include('landingpages.components.Bar',['berita'=>$berita])
        </div>
    </div>
    
    @endsection
</body>
</html>
