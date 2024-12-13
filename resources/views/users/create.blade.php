<x-app-layout>
    <div class="container">
        <h1>Tambah User</h1>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    value="{{ old('name') }}"
                />
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                    value="{{ old('email') }}"
                />
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nomor_hp" class="form-label">Phone Number</label>
                <input
                    type="text"
                    name="nomor_hp"
                    id="nomor_hp"
                    class="form-control"
                    value="{{ old('nomor_hp') }}"
                />
                @error('nomor_hp')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="banned">Banned</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="guru_id" class="form-label">Guru</label>
                <select name="guru_id" id="guru_id" class="form-control">
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

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                />
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">
                    Confirm Password
                </label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    class="form-control"
                />
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-medium">Roles</label>
                <div class="d-flex flex-wrap">
                    @if ($roles->isNotEmpty())
                        @foreach ($roles as $role)
                            <div class="form-check m-2">
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

            <button type="submit" class="btn btn-success">Create User</button>
        </form>
    </div>
</x-app-layout>
