<!DOCTYPE html>
<html lang="en" x-data="{ navbarOpen: false }">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <title>Dashboard Admin</title>
        <script
            defer
            src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
        ></script>
    </head>
    <body>
        <nav
            class="navbar navbar-expand-lg navbar-light border-bottom border-gray-100 sticky-top"
            style="background-color: #007bff"
        >
            <div class="container-fluid">
                <!-- Logo -->
                <div style="display: flex">
                    <a
                        class="navbar-brand"
                        href="{{ route('dashboard.index') }}"
                    >
                        <img
                            src="{{ asset('images/tut_wuri_handa.png') }}"
                            width="45"
                            height="45"
                            alt="Logo"
                        />
                    </a>
                    <h1
                        class="navbar-brand"
                        style="font-size: 20px; color: white; margin-top: 10px"
                    >
                        SD N Peraduan Waras
                    </h1>
                </div>

                <!-- Navbar Toggle Button for Mobile -->
                <button
                    class="navbar-toggler"
                    type="button"
                    @click="navbarOpen = !navbarOpen"
                    :aria-expanded="navbarOpen"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Links -->
                <div
                    class="collapse navbar-collapse"
                    id="navbarNav"
                    :class="{ show: navbarOpen }"
                >
                    <ul class="navbar-nav">
                        <!-- Dashboard Link -->
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="{{ route('dashboard.index') }}"
                                @click="navbarOpen = false"
                            >
                                {{ __('Dashboard') }}
                            </a>
                        </li>
                    </ul>

                    @if (Auth::user()->can('Superadmin'))
                        <ul class="navbar-nav">
                            <!-- Users Link -->
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="/users"
                                    @click="navbarOpen = false"
                                >
                                    {{ __('Users') }}
                                </a>
                            </li>
                        </ul>
                    @endif

                    @if (Auth::user()->can('Guru'))
                        <ul class="navbar-nav">
                            <!-- Data Dropdown -->
                            <li class="nav-item dropdown">
                                <a
                                    class="dropdown-toggle nav-link"
                                    href="#"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                >
                                    {{ __('Data') }}
                                </a>
                                <ul
                                    class="dropdown-menu"
                                    style="border-radius: 10px"
                                >
                                    <li>
                                        <a class="dropdown-item" href="/guru">
                                            Data Guru
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/siswa">
                                            Data Siswa
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/nilai">
                                            Nilai Siswa
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endif

                    @if (Auth::user()->can('Staff') || Auth::user()->can('Kepala Sekolah'))
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="/pengaduan"
                                    @click="navbarOpen = false"
                                >
                                    {{ __('Pengaduan') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="/penerimaan"
                                    @click="navbarOpen = false"
                                >
                                    {{ __('PPDB') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="/berita"
                                    @click="navbarOpen = false"
                                >
                                    {{ __('Berita') }}
                                </a>
                            </li>
                        </ul>
                    @endif

                    @if (Auth::user()->can('Staff'))
                        <ul class="navbar-nav">
                            <!-- Jadwal & Kelas Dropdown -->
                            <li class="nav-item dropdown">
                                <a
                                    class="dropdown-toggle nav-link"
                                    href="#"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                >
                                    {{ __('Jadwal & Kelas') }}
                                </a>
                                <ul
                                    class="dropdown-menu"
                                    style="border-radius: 10px"
                                >
                                    <li>
                                        <a class="dropdown-item" href="/kelas">
                                            Kelas
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="/mata_pelajaran"
                                        >
                                            Mata Pelajaran
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/jadwal">
                                            Tahun Ajaran & Mata Pelajaran
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endif

                    @if (Auth::check() && Auth::user()->hasRole('Siswa'))
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="/nilai"
                                    @click="navbarOpen = false"
                                >
                                    {{ __('Nilai') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="/jadwal"
                                    @click="navbarOpen = false"
                                >
                                    {{ __('Mata Pelajaran') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="/siswa"
                                    @click="navbarOpen = false"
                                >
                                    {{ __('Data') }}
                                </a>
                            </li>
                        </ul>
                    @endif

                    <!-- Profile Dropdown -->
                    <ul class="navbar-nav ms-auto" style="margin-right: 100px">
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link"
                                href="#"
                                role="button"
                                data-bs-toggle="dropdown"
                            >
                                @if (Auth::user()->image)
                                    <img
                                        src="{{ route('file.show', Auth::user()->image->id) }}"
                                        alt="{{ Auth::user()->name }}"
                                        class="rounded-circle"
                                        width="50"
                                        height="50"
                                        style="object-fit: cover"
                                    />
                                @else
                                    <img
                                        src="{{ asset('images/default_profile.jpg') }}"
                                        alt=""
                                        class="rounded-circle"
                                        width="50"
                                        height="50"
                                        style="object-fit: cover"
                                    />
                                @endif
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="currentColor"
                                            class="bi bi-house"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"
                                            />
                                        </svg>
                                        {{ __('Home') }}
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="{{ route('profile.edit') }}"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="currentColor"
                                            class="bi bi-person"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"
                                            />
                                        </svg>
                                        {{ __('Profile') }}
                                    </a>
                                </li>
                                <li>
                                    <form
                                        method="POST"
                                        action="{{ route('logout') }}"
                                    >
                                        @csrf
                                        <a
                                            class="dropdown-item"
                                            href="#"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                fill="currentColor"
                                                class="bi bi-box-arrow-left"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"
                                                />
                                                <path
                                                    d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"
                                                />
                                            </svg>
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <style>
            .nav-link {
                color: white;
            }
        </style>
        <!-- Bootstrap Bundle JS (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
