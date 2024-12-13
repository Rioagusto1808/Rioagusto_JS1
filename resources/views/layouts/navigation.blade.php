<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <title>Dashboard Admin</title>
    </head>
    <body>
        <nav
            class="navbar navbar-expand-lg navbar-light border-bottom border-gray-100"
            style="background-color: #007bff"
        >
            <div class="container-fluid">
                <!-- Logo -->
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <x-application-logo
                        class="h-9 w-auto fill-current text-gray-800 dark:text-gray-200"
                    />
                </a>

                <!-- Navbar Toggle Button for Mobile -->
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul
                        class="navbar-nav justify-content-start"
                        style="margin-left: 85px"
                    >
                        <!-- Links akan tetap di kiri -->
                        <!-- Dashboard Link -->
                        <li class="nav-item">
                            <a
                                class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                href="{{ route('dashboard') }}"
                            >
                                {{ __('Dashboard') }}
                            </a>
                        </li>
                    </ul>
                    @if (Auth::user()->can('Superadmin'))
                        <ul class="navbar-nav justify-content-start">
                            <!-- Links akan tetap di kiri -->
                            <!-- Dashboard Link -->
                            <li class="nav-item">
                                <a
                                    class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                    href="/users"
                                >
                                    {{ __('Users') }}
                                </a>
                            </li>
                        </ul>

                        <ul class="navbar-nav justify-content-start">
                            <!-- Links akan tetap di kiri -->
                            <!-- Dashboard Link -->
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle {{ request()->routeIs('dashboard') ? 'active' : '' }}"
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
                                        <a class="dropdown-item" href="#">
                                            Data Siswa
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endif

                    <ul class="navbar-nav justify-content-start">
                        <!-- Links akan tetap di kiri -->
                        <!-- Dashboard Link -->
                        <li class="nav-item">
                            <a
                                class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                href="{{ route('dashboard') }}"
                            >
                                {{ __('Pengaduan') }}
                            </a>
                        </li>
                    </ul>

                    <ul class="navbar-nav justify-content-start">
                        <!-- Links akan tetap di kiri -->
                        <!-- Dashboard Link -->
                        <li class="nav-item">
                            <a
                                class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                href="{{ route('dashboard') }}"
                            >
                                {{ __('PPBD') }}
                            </a>
                        </li>
                    </ul>

                    <ul class="navbar-nav justify-content-start">
                        <!-- Links akan tetap di kiri -->
                        <!-- Dashboard Link -->
                        <li class="nav-item">
                            <a
                                class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                href="{{ route('dashboard') }}"
                            >
                                {{ __('Galeri') }}
                            </a>
                        </li>
                    </ul>

                    <ul class="navbar-nav justify-content-start">
                        <!-- Links akan tetap di kiri -->
                        <!-- Dashboard Link -->
                        <li class="nav-item">
                            <a
                                class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                href="{{ route('dashboard') }}"
                            >
                                {{ __('Berita') }}
                            </a>
                        </li>
                    </ul>

                    <!-- Profile Dropdown (ke kanan) -->
                    <ul class="navbar-nav ms-auto me-5">
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                {{ Auth::user()->name }}
                            </a>
                            <ul
                                class="dropdown-menu"
                                aria-labelledby="navbarDropdown"
                            >
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
                                                    fill-rule="evenodd"
                                                    d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"
                                                />
                                                <path
                                                    fill-rule="evenodd"
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

        <!-- Bootstrap Bundle JS (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navbarNav = document.querySelector('#navbarNav');

            // Close the menu when a link is clicked
            const closeMenu = () => {
                if (navbarNav.classList.contains('show')) {
                    navbarNav.classList.remove('show');
                }
            };

            // Listen for clicks on navbar links and close the menu
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            navLinks.forEach((link) => {
                link.addEventListener('click', closeMenu);
            });
        </script>
    </body>
</html>
