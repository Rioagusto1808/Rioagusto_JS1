<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Card Container -->
    <div
        class="card shadow-lg mx-auto"
        style="max-width: 400px; margin-top: 100px"
    >
        <!-- Menampilkan Pesan Kesalahan Umum -->
        @if ($errors->any() && ! $errors->has('loginError'))
            <div id="error-message" class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body">
            <!-- Login Heading -->
            <h3 class="card-title text-center mb-4">
                {{ __('Login to Your Account') }}
            </h3>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
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
                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2 text-danger"
                    />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input
                        id="password"
                        class="form-control"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password"
                    />
                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2 text-danger"
                    />
                </div>

                <!-- Remember Me -->
                <div class="form-check mb-3">
                    <label for="remember_me" class="form-check-label">
                        <input
                            id="remember_me"
                            type="checkbox"
                            class="form-check-input"
                            name="remember"
                        />
                        <span class="ms-2 text-muted">
                            {{ __('Remember me') }}
                        </span>
                    </label>
                </div>

                <!-- Forgot Password & Login Button -->
                <div class="d-flex justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                        <a
                            class="btn btn-link text-muted text-decoration-none"
                            href="{{ route('password.request') }}"
                        >
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="btn btn-primary">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
