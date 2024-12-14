<x-app-layout>
    <div class="container">
        <h1 class="mb-4">Tambah User</h1>
        <form
            action="{{ route('users.store') }}"
            method="POST"
            class="shadow-lg p-4 rounded-3 bg-light"
        >
            @csrf

            <!-- Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    placeholder="Enter user's name"
                    required
                />
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    placeholder="Enter user's email"
                    required
                />
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Phone Number Field -->
            <div class="mb-3">
                <label for="nomor_hp" class="form-label">Phone Number</label>
                <input
                    type="text"
                    name="nomor_hp"
                    id="nomor_hp"
                    class="form-control"
                    value="{{ old('nomor_hp') }}"
                    placeholder="Enter user's phone number"
                    required
                />
                @error('nomor_hp')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Status Field -->
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="banned">Banned</option>
                </select>
            </div>

            <!-- Guru Field -->
            <div class="mb-3">
                <label for="guru_id" class="form-label">Guru</label>
                <select name="guru_id" id="guru_id" class="form-select">
                    <option value="">-- Select Guru --</option>
                    @foreach ($gurus as $guru)
                        <option
                            value="{{ $guru->id }}"
                            {{ old('guru_id') == $guru->id ? 'selected' : '' }}
                        >
                            {{ $guru->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Password Field -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    placeholder="Enter password"
                    required
                />
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password Field -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">
                    Confirm Password
                </label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    class="form-control"
                    placeholder="Confirm your password"
                    required
                />
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

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100 py-2 mt-3">
                Create User
            </button>
        </form>
    </div>
</x-app-layout>
