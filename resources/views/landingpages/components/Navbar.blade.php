<!-- resources/views/landingpages/components/Navbar.blade.php -->
<nav
    x-data="{ isOpen: false }"
    class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top"
    style="background-color: rgb(0, 92, 224); margin-bottom: 0"
>
    <div class="container">
        <!-- Logo -->
        <a
            class="navbar-brand text-white"
            href="#"
            style="display: flex; align-items: center"
        >
            <img
                src="{{ asset('images/tut_wuri_handayani.png') }}"
                width="50"
                height="50"
                alt="Logo"
            />
            <h1 class="ms-2">SD Negeri Peraduan Waras</h1>
        </a>

        <!-- Hamburger Button -->
        <button
            @click="isOpen = !isOpen"
            class="navbar-toggler"
            type="button"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Menu -->
        <div
            x-show="isOpen"
            x-transition
            class="navbar-collapse"
            :class="{'show': isOpen}"
            style="background-color: rgb(0, 92, 224); padding-bottom: 10px"
        >
            <ul class="navbar-nav ms-auto">
                <!-- Beranda -->
                <li class="nav-item dropdown">
                    <a
                        class="nav-link text-white"
                        href="#"
                        id="berandaDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                    >
                        Beranda
                    </a>
                </li>

                <!-- Tentang Kami -->
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle text-white"
                        href="#"
                        id="tentangDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                    >
                        Profile Sekolah
                    </a>
                    <ul class="dropdown-menu" style="border-radius: 10px">
                        <li>
                            <a class="dropdown-item" href="#">
                                Sambutan Kepala Sekolah
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                Video Profile Sekolah
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Visi & Misi</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                Struktur Organisasi
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                Akreditasi Sekolah
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="#">Fasilitas</a></li>
                        <li>
                            <a class="dropdown-item" href="#">Galeri Foto</a>
                        </li>
                    </ul>
                </li>

                <!-- Alumni -->
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle text-white"
                        href="#"
                        id="alumniDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                    >
                        Alumni
                    </a>
                    <ul class="dropdown-menu" style="border-radius: 10px">
                        <li>
                            <a class="dropdown-item" href="#">Profil Alumni</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                Testimoni Alumni
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Hubungi Kami -->
                <li class="nav-item dropdown">
                    <a
                        class="nav-link text-white"
                        href="#"
                        id="hubungiDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                    >
                        Hubungi Kami
                    </a>
                </li>

                <!-- Berita -->
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle text-white"
                        href="#"
                        id="beritaDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                    >
                        Berita
                    </a>
                    <ul class="dropdown-menu" style="border-radius: 10px">
                        <li><a class="dropdown-item" href="#">Foto</a></li>
                        <li><a class="dropdown-item" href="#">Video</a></li>
                    </ul>
                </li>

                <!-- Galeri -->
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle text-white"
                        href="#"
                        id="galeriDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                    >
                        Galeri
                    </a>
                    <ul class="dropdown-menu" style="border-radius: 10px">
                        <li><a class="dropdown-item" href="#">Foto</a></li>
                        <li><a class="dropdown-item" href="#">Video</a></li>
                    </ul>
                </li>

                <!-- Informasi -->
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle text-white"
                        href="#"
                        id="galeriDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                    >
                        Informasi
                    </a>
                    <ul class="dropdown-menu" style="border-radius: 10px">
                        <li><a class="dropdown-item" href="#">PPDB</a></li>
                        <li>
                            <a class="dropdown-item" href="#">Data Siswa</a>
                        </li>
                        <li><a class="dropdown-item" href="#">Data Guru</a></li>
                    </ul>
                </li>

                <!-- Layanan Informasi Sekolah -->
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" role="button">
                        Layanan Informasi
                    </a>
                </li>

                <!-- Login Perangkat -->
                <li class="nav-item">
                    @auth
                        <!-- Jika pengguna sudah login, tampilkan link ke Dashboard -->
                        <a
                            style="margin-top: 10px"
                            class="nav-link btn"
                            href="{{ route('dashboard') }}"
                            role="button"
                        >
                            Dashboard
                        </a>
                    @else
                        <!-- Jika pengguna belum login, tampilkan link ke Login -->
                        <a
                            style="margin-top: 10px"
                            class="nav-link btn"
                            href="{{ route('login') }}"
                            role="button"
                        >
                            Login
                        </a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .nav-link {
        font-size: 15px;
    }
    .dropdown-item {
        font-size: 15px;
    }
    .navbar-nav {
        gap: 10px;
    }
    .nav-link.btn {
        display: inline-block;
        padding: 5px 19px;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        background-color: #007bff; /* Warna biru */
        color: white;
        border-radius: 10px;
        border: 2px solid white; /* Menambahkan border putih */
        text-decoration: none; /* Menghapus underline */
        transition:
            background-color 0.3s ease,
            border-color 0.3s ease;
    }

    .nav-link.btn:hover {
        background-color: #0056b3; /* Warna biru lebih gelap saat hover */
        border-color: #ffffff; /* Border tetap putih saat hover */
    }
</style>
<!-- Bootstrap Bundle JS (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Alpine.js CDN -->
<script src="//unpkg.com/alpinejs" defer></script>
