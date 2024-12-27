<x-app-layout>
    <div class="container">
        <h1 class="mb-4">Edit User</h1>
        <form
            action="{{ route('users.update', $user) }}"
            class="shadow-lg p-4 rounded-3 bg-light"
            method="POST"
        >
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control shadow-sm"
                    value="{{ old('name', $user->name) }}"
                />
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control shadow-sm"
                    value="{{ old('email', $user->email) }}"
                />
            </div>

            <div class="mb-3">
                <label for="nomor_hp" class="form-label">Phone Number</label>
                <input
                    type="text"
                    name="nomor_hp"
                    id="nomor_hp"
                    class="form-control shadow-sm"
                    value="{{ old('nomor_hp', $user->nomor_hp) }}"
                />
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select
                    name="status"
                    id="status"
                    class="form-control shadow-sm"
                >
                    <option
                        value="active"
                        {{ $user->status == 'active' ? 'selected' : '' }}
                    >
                        Active
                    </option>
                    <option
                        value="inactive"
                        {{ $user->status == 'inactive' ? 'selected' : '' }}
                    >
                        Inactive
                    </option>
                    <option
                        value="banned"
                        {{ $user->status == 'banned' ? 'selected' : '' }}
                    >
                        Banned
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label for="guru_id" class="form-label">Guru</label>
                <select
                    name="guru_id"
                    id="guru_id"
                    class="form-control shadow-sm"
                >
                    <option value="">-- Select Guru --</option>
                    @foreach ($gurus as $guru)
                        <option
                            value="{{ $guru->id }}"
                            {{ old('guru_id', $user->guru_id) == $guru->id ? 'selected' : '' }}
                        >
                            {{ $guru->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Password Field -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        placeholder="Enter password"
                    />
                    <button
                        class="btn btn-outline-secondary"
                        type="button"
                        id="togglePassword"
                    >
                        <i class="bi bi-eye-fill"></i>
                    </button>
                </div>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password Field -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">
                    Confirm Password
                </label>
                <div class="input-group">
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        class="form-control"
                        placeholder="Confirm your password"
                    />
                    <button
                        class="btn btn-outline-secondary"
                        type="button"
                        id="togglePasswordConfirm"
                    >
                        <i class="bi bi-eye-fill"></i>
                    </button>
                </div>
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Roles Field -->
            <div class="form-group mb-4">
                <label class="font-weight-medium">Roles</label>
                <div class="d-flex flex-wrap">
                    @if ($roles->isNotEmpty())
                        @foreach ($roles as $role)
                            <div class="form-check form-check-inline m-2">
                                <input
                                    id="role-{{ $role->id }}"
                                    type="checkbox"
                                    class="form-check-input"
                                    name="role[]"
                                    value="{{ $role->name }}"
                                    {{ (is_array(old('role')) && in_array($role->name, old('role'))) || (isset($user) && $user->hasRole($role->name)) ? 'checked' : '' }}
                                />
                                <label
                                    for="role-{{ $role->id }}"
                                    class="form-check-label"
                                >
                                    {{ $role->name }}
                                </label>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-primary shadow-sm">
                Update User
            </button>
        </form>
    </div>
</x-app-layout>
<script>
    // Toggle Password Visibility
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', () => {
        const type =
            password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        togglePassword.innerHTML =
            type === 'password'
                ? '<i class="bi bi-eye-fill"></i>'
                : '<i class="bi bi-eye-slash-fill"></i>';
    });

    // Toggle Confirm Password Visibility
    const togglePasswordConfirm = document.querySelector(
        '#togglePasswordConfirm'
    );
    const passwordConfirm = document.querySelector('#password_confirmation');
    togglePasswordConfirm.addEventListener('click', () => {
        const type =
            passwordConfirm.getAttribute('type') === 'password'
                ? 'text'
                : 'password';
        passwordConfirm.setAttribute('type', type);
        togglePasswordConfirm.innerHTML =
            type === 'password'
                ? '<i class="bi bi-eye-fill"></i>'
                : '<i class="bi bi-eye-slash-fill"></i>';
    });
</script>
