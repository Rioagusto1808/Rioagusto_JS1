<!-- Footer -->
<footer
    class="text-center text-lg-start text-white pt-2 position-relative"
    style="
        background-image: url({{ asset('images/Background_Footer.png') }}');
        background-position: center;
        background-size: cover;
    "
>
    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Section: Links -->
    <section style="font-size: 15px">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-5 col-lg-5 col-xl-5 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="fw-bold">SD Negeri Peraduan Waras</h6>
                    <p>
                        Hadir dengan berbagai macam informasi seputar SD Negeri
                        Peraduan Waras. dengan inovasi dan teknologi terbaru.
                    </p>
                    <div class="w-100 d-flex atur-logo">
                        <a href="https://jdihn.go.id/">
                            <img
                                src="{{ URL::asset('/images/Logo-JDIH 2.png') }}"
                                class="logo-img"
                                alt=""
                            />
                        </a>
                        <a href="https://bphn.go.id/">
                            <img
                                src="{{ URL::asset('/images/kemenkumhan.png') }}"
                                class="logo-img"
                                alt=""
                            />
                        </a>
                        <a href="https://jdih.lampungprov.go.id/" class="grow">
                            <img
                                src="{{ URL::asset('/images/jdih-lampung.png') }}"
                                class="logo-img"
                                alt=""
                            />
                        </a>
                    </div>
                    <style>
                        .atur-logo {
                            display: flex;
                            justify-content: flex-start;
                            align-items: center;
                            gap: 10px;
                        }

                        .logo-img {
                            max-width: 200px;
                            height: auto;
                        }

                        .grow {
                            flex-grow: 1;
                            text-align: left;
                        }
                    </style>
                </div>

                <div class="col-md-5 col-lg-5 col-xl-5 mx-auto mb-md-0">
                    <h6 class="fw-bold">Kontak Kami</h6>
                    <p>
                        <i class="fas fa-home mr-3"></i>
                        Jl. Raya Kedondong, Way Layap Kec. Gedong Tataan
                        Kabupaten Pesawaran Kode Pos 35371
                    </p>
                    <p>
                        <i class="fas fa-phone mr-3"></i>
                        0821-8022-2263
                    </p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i>
                        sdn2peraduanwaras@gmail.com
                    </p>
                    <p>
                        <i class="fas fa-globe"></i>
                        sdnnegeri2.lampung.com
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-5">
                    <!-- Links -->
                    <h6 class="fw-bold">Sosial Media</h6>
                    <a
                        href="https://www.facebook.com/profile.php?id=100080233301689&mibextid=ZbWKwL"
                        class="text-white m-1"
                    >
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a
                        href="https://www.instagram.com/bagian_hukum_pesawaran/profilecard/?igsh=MWFsNWdqNHkxNDExdQ== "
                        class="text-white m-1"
                    >
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="" class="text-white m-1">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="text-white m-1">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links -->

    <!-- Copyright -->
    <div
        class="text-center p-3"
        style="background-color: rgb(0, 92, 224); color: rgb(255, 255, 255)"
    >
        Hak Cipta ©
        <span id="current-year"></span>
        Sekolah Dasar Negeri 2 Peraduan Waras
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

<style>
    body {
        overflow-x: hidden;
    }

    .navbar {
        color: white;
    }

    .navbar .navbar-brand,
    .navbar .nav-link {
        color: white;
    }

    .container-beranda {
        position: relative;
        background-image: url('{{ asset('images/wallpaper.png') }}');
        background-size: cover;
        background-position: center;
        min-height: 100vh;
        /* Menggunakan tinggi layar sebagai referensi */
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        /*shadow*/
    }

    /* Menambahkan overlay */
    .container-beranda::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Menggelapkan gambar */
        z-index: 1;
    }

    /* Agar konten tetap berada di atas overlay */
    .container-beranda * {
        position: relative;
        z-index: 2;
    }

    .peraturan {
        background-image: url('{{ asset('images/mozaik.jpeg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        width: 100%;
    }

    .custom-legend {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .legend-item {
        margin-right: 20px;
        display: flex;
        align-items: center;
    }

    .legend-color {
        width: 20px;
        height: 20px;
        margin-right: 5px;
    }

    .statistik {
        background-image: url('{{ asset('images/statistik-bg.png') }}');
        color: white;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 500px;
        width: 100%;
    }

    .table,
    .table th,
    .table td {
        border: none;
        background-color: transparent;
        color: white;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgb(0, 51, 124);
        z-index: -1;
    }

    a i {
        text-decoration: none;
        border: none;
    }

    a {
        text-decoration: none;
        border: none;
        outline: none;
    }

    @media (max-width: 768px) {
        .navbar {
            height: 50px;
        }

        #logo-jdih {
            display: none;
        }

        .navbar-toggler {
            position: absolute;
            left: 0;
            top: 0;
            padding: 10px;
            z-index: 10;
        }

        #beranda {
            margin-top: 50px;
        }

        .container.d-flex {
            justify-content: flex-start;
        }
    }
</style>

<script>
    document.getElementById('current-year').textContent =
        new Date().getFullYear();
</script>
