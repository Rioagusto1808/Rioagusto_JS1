<!-- resources/views/landingpages/components/Navbar.blade.php -->
<nav
    x-data="{ isOpen: false }"
    class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top"
    style="background-color: rgb(0, 92, 224); margin-bottom: 0"
>
    <div class="container">
        <!-- Logo -->
        <a
            class="navbar-brand text-white d-flex align-items-center ms-auto"
            href="/"
        >
            <img
                src="{{ asset('images/tut_wuri_handa.png') }}"
                width="40"
                height="40"
                alt="Logo"
                class="logos"
                id="imgs"
            />
            <h1 class="logos" style="margin-left: 10px; font-size: 20px">
                SD Negeri Peraduan Waras
            </h1>
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
            style="
                border-radius: 10px;
                background-color: rgb(0, 92, 224);
                width: 100%;
                box-sizing: border-box;
                padding-left: 20px;
                padding-right: 20px;
            "
        >
            <ul class="navbar-nav ms-auto">
                <!-- Beranda -->
                <li class="nav-item">
                    <a
                        class="nav-link text-white"
                        href="/"
                        id="berandaDropdown"
                        role="button"
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
                            <a
                                class="dropdown-item"
                                href="/sambutan-kepala-sekolah"
                            >
                                Sambutan Kepala Sekolah
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/profile-sekolah">
                                Profile Sekolah
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/visi-misi">
                                Visi & Misi
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="/struktur-organisasi"
                            >
                                Struktur Organisasi
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/akreditasi-sekolah">
                                Akreditasi Sekolah
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/fasilitas">
                                Fasilitas
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Hubungi Kami -->
                <li class="nav-item">
                    <a
                        class="nav-link text-white"
                        href="/hubungi-kami"
                        id="hubungiDropdown"
                        role="button"
                    >
                        Hubungi Kami
                    </a>
                </li>

                <!-- Berita -->
                <li class="nav-item">
                    <a
                        class="nav-link text-white"
                        href="/full-berita"
                        id="beritaDropdown"
                        role="button"
                    >
                        Berita
                    </a>
                </li>

                <!-- Galeri -->
                <li class="nav-item">
                    <a
                        class="nav-link text-white"
                        href="/full-galeri"
                        id="galeriDropdown"
                        role="button"
                    >
                        Galeri
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link text-white"
                        href="/ppdb"
                        id="galeriDropdown"
                        role="button"
                    >
                        PPDB
                    </a>
                </li>

                <!-- Layanan Informasi Sekolah -->
                <li class="nav-item">
                    <a
                        class="nav-link text-white"
                        href="{{ route('LayananInformasi') }}"
                        role="button"
                    >
                        Layanan Informasi
                    </a>
                </li>

                <!-- Login Perangkat -->
                <li class="nav-item">
                    @auth
                        <!-- Jika pengguna sudah login, tampilkan link ke Dashboard -->
                        <a
                            class="nav-link btn"
                            href="{{ route('dashboard.index') }}"
                            role="button"
                        >
                            Dashboard
                        </a>
                    @else
                        <!-- Jika pengguna belum login, tampilkan link ke Login -->
                        <a
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
@yield('breadcrumb')

<style>
    .dropdown-item {
        font-size: 15px;
    }
    .navbar {
        display: flex;
        align-items: center; /* Vertikal center */
    }

    .navbar-nav {
        gap: 10px;
    }

    .nav-item .nav-link {
        font-size: 15px;
        padding-top: 8px;
        padding-bottom: 8px;
    }

    .nav-link.btn {
        display: inline-block;
        padding: 5px 19px;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        background-color: #007bfa; /* Warna biru */
        color: white;
        border-radius: 10px;
        border: 2px solid white;
        text-decoration: none;
        transition:
            background-color 0.3s ease,
            border-color 0.3s ease;
    }

    .nav-link.btn:hover {
        background-color: #0056b3;
        border-color: #ffffff;
    }

    /* Responsive styling */
    @media (max-width: 768px) {
        .navbar-collapse {
            padding-top: 5px;
            padding-bottom: 20px;
        }
        .navbar-brand .logos {
            font-size: 15px;
            margin-top: -10px;
        }
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Alpine.js CDN -->
<script src="//unpkg.com/alpinejs" defer></script>
