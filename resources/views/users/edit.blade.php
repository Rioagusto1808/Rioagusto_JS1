<x-app-layout>
    <div class="container">
        <h1>Edit User</h1>

        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    value="{{ old('name', $user->name) }}"
                    required
                />
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                    value="{{ old('email', $user->email) }}"
                    required
                />
            </div>

            <div class="mb-3">
                <label for="nomor_hp" class="form-label">Phone Number</label>
                <input
                    type="text"
                    name="nomor_hp"
                    id="nomor_hp"
                    class="form-control"
                    value="{{ old('nomor_hp', $user->nomor_hp) }}"
                />
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
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
                <select name="guru_id" id="guru_id" class="form-control">
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
                <label>Roles</label>
                <div class="form-check">
                    @if ($roles->isNotEmpty())
                        @foreach ($roles as $role)
                            <div class="form-check">
                                <input
                                    {{ $hasRoles->contains($role->id) ? 'checked' : '' }}
                                    id="role-{{ $role->id }}"
                                    type="checkbox"
                                    class="form-check-input"
                                    name="role[]"
                                    value="{{ $role->name }}"
                                />
                                <label
                                    class="form-check-label"
                                    for="role-{{ $role->id }}"
                                >
                                    {{ $role->name }}
                                </label>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
</x-app-layout>
