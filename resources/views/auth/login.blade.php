@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
    /* Global Styles */
    body {
        margin: 0;
        padding: 0;
        background: url('{{ asset('images/background_login.jpg') }}') no-repeat center center fixed;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
    }

    /* Animation for Card */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Card Styling */
    .card {
        background: rgba(255, 255, 255, 0.85);
        border-radius: 15px;
        padding: 35px 30px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
        animation: fadeIn 1s ease-in-out;
        max-width: 400px;
        width: 90%;
        text-align: center;
        margin: 20px;
        backdrop-filter: blur(3px);
    }

    .card-title {
        font-size: 2rem;
        font-weight: bold;
        color: #007bff;
        margin-bottom: 20px;
    }

    .text-muted {
        font-size: 1rem;
        color: #6c757d;
    }

    /* Input Styling */
    .form-control {
        border-radius: 8px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
        padding: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 10px rgba(79, 70, 229, 0.5);
        outline: none;
    }

    /* Button Styling */
    .btn-primary {
        background-color: #007bff;
        border: none;
        border-radius: 8px;
        padding: 12px 25px;
        font-size: 1rem;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #007bff;
    }

    /* Checkbox */
    .form-check-label {
        font-size: 0.9rem;
        color: #6c757d;
    }

    /* Link Styling */
    .btn-link {
        font-size: 0.9rem;
        text-decoration: none;
        color: #6c757d;
        transition: color 0.3s ease;
    }

    .btn-link:hover {
        color: ##007bff;
    }

    /* Footer */
    .footer {
        margin-top: 20px;
        font-size: 0.9rem;
        color: #888;
    }

    /* Responsive Design */
    @media (min-width: 768px) {
        .card {
            max-width: 450px;
            padding: 40px 35px;
        }
    }

    @media (min-width: 1024px) {
        .card {
            max-width: 500px;
        }
    }
    .text-danger-wave {
        display: inline-block;
        color: #dc3545;
        animation: wave-animation 1.5s infinite ease-in-out;
    }

    @keyframes wave-animation {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-5px);
        }
    }
     /* Adjust icon size */
     #toggle-password i {
        font-size: 1.2rem; /* Sesuaikan ukuran ikon */
        color: #6c757d; /* Warna default */
        transition: color 0.3s ease; /* Efek transisi warna */
    }

    #toggle-password:hover i {
        color: #007bff; /* Warna ikon saat hover */
    }
</style>

<!-- Card Container -->
<div class="card">
    <!-- Menampilkan Pesan Kesalahan Umum -->
                    @if ($errors->any() && !$errors->has('loginError'))
                        <div id="error-message" class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <script>
                            // Menghilangkan pesan kesalahan setelah 5 detik
                            setTimeout(function() {
                                var errorMessage = document.getElementById('error-message');
                                if (errorMessage) {
                                    errorMessage.style.display = 'none'; // Menghilangkan elemen
                                }
                            }, 5000); // 5000 ms = 5 detik
                        </script>
                    @endif
                    @if ($errors->has('loginError'))
                        <div id="throttle-message" class="alert alert-danger">
                            <p class="btn-danger">{{ $errors->first('loginError') }}
                                @if (session('remainingSeconds'))
                                    Silakan coba lagi dalam <span id="countdown">{{ session('remainingSeconds') }}</span>
                                    detik.
                            </p>
                    @endif
                </div>

                @if (session('remainingSeconds'))
                    <script>
                        let countdownElement = document.getElementById("countdown");
                        let remainingSeconds = parseInt(countdownElement.innerText);

                        function updateCountdown() {
                            if (remainingSeconds > 0) {
                                remainingSeconds--;
                                countdownElement.innerText = remainingSeconds;
                            } else {
                                document.getElementById("throttle-message").innerText = "Anda bisa mencoba login kembali sekarang.";
                            }
                        }

                        // Update setiap detik
                        setInterval(updateCountdown, 1000);
                    </script>
                @endif
                @endif

    <!-- Login Heading -->
    <h3 class="card-title">{{ __('Selamat Datang') }}</h3>
    <p class="text-muted">Silahkan Masukkan Akun Anda</p>

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-4 text-start">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input
                id="email"
                class="form-control"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                placeholder="Enter your email"
            />
        </div>

        <!-- Password -->
<div class="mb-4 text-start">
    <x-input-label for="password" :value="__('Password')" />
    <div class="input-group">
        <x-text-input
            id="password"
            class="form-control"
            type="password"
            name="password"
            required
            autocomplete="current-password"
            placeholder="Enter your password"
        />
        <span class="input-group-text" id="toggle-password" style="cursor: pointer; height:50px;">
            <i id="password-icon" class="bi bi-eye"></i>
        </span>
    </div>

</div>


        <!-- Remember Me -->
        <div class="form-check mb-4 text-start">
            <label for="remember_me" class="form-check-label">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="form-check-input"
                    name="remember"
                />
                <span class="ms-2">{{ __('Ingat saya') }}</span>
            </label>
        </div>

        <!-- Forgot Password & Login Button -->
        <div class="d-flex justify-content-between align-items-center">

            <button type="submit" class="btn-primary">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('toggle-password');
        const passwordIcon = document.getElementById('password-icon');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Ganti ikon berdasarkan jenis input
            if (type === 'password') {
                passwordIcon.classList.remove('bi-eye-slash');
                passwordIcon.classList.add('bi-eye');
            } else {
                passwordIcon.classList.remove('bi-eye');
                passwordIcon.classList.add('bi-eye-slash');
            }
        });
    });
</script>

