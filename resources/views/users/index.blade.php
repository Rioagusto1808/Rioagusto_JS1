<x-app-layout>
    <div class="container mb-4">
        <h1 class="mb-4">Tabel User</h1>

        <div class="d-flex justify-content-between mb-4">
            <!-- "Tambah Siswa" Button -->
            <a
                href="{{ route("users.create") }}"
                class="btn btn-success shadow-sm"
            >
                <i class="bi bi-person-plus"></i>
                Tambah User
            </a>

            <!-- Search Form -->
            <form
                method="GET"
                action="{{ route("users.index") }}"
                class="d-flex flex-wrap gap-3"
            >
                <div class="form-group mb-0">
                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        class="form-control"
                        value="{{ old("nama", $nama) }}"
                        placeholder="Cari berdasarkan nama"
                    />
                </div>
                <div class="form-group mb-0">
                    <input
                        type="text"
                        id="email"
                        name="email"
                        class="form-control"
                        value="{{ old("email", $email) }}"
                        placeholder="Cari berdasarkan email"
                    />
                </div>
                <div class="form-group mb-0">
                    <div class="dropdown">
                        <select
                            name="status"
                            id="status"
                            class="form-select"
                            aria-label="Pilih Status"
                        >
                            <option value="">Pilih Status</option>
                            <option
                                value="active"
                                {{ old("status", $status) == "active" ? "selected" : "" }}
                            >
                                Active
                            </option>
                            <option
                                value="inactive"
                                {{ old("status", $status) == "inactive" ? "selected" : "" }}
                            >
                                Inactive
                            </option>
                            <option
                                value="banned"
                                {{ old("status", $status) == "banned" ? "selected" : "" }}
                            >
                                Banned
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group mb-0">
                    <div class="dropdown">
                        <select
                            name="guru_id"
                            id="guru_id"
                            class="form-select"
                            aria-label="Pilih Kelas"
                        >
                            <option value="">Pilih Kelas</option>
                            @foreach ($gurus as $k)
                                <option
                                    value="{{ $k->id }}"
                                    {{ old("guru_id", $guru_id) == $k->id ? "selected" : "" }}
                                >
                                    {{ $k->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>

        <div class="table-responsive">
            <table
                class="table table-hover table-bordered table-striped table-sm shadow-sm rounded-3"
            >
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th>Role</th>
                        <th>Guru</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $users->firstItem() + $index }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->nomor_hp }}</td>
                            <td>
                                <span
                                    class="badge @if ($user->status == "active")
                                        bg-success
                                    @elseif ($user->status == "inactive")
                                        bg-warning
                                    @else
                                        bg-danger
                                    @endif"
                                >
                                    {{ ucfirst($user->status) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $user->roles->pluck("name")->implode(", ") }}
                                </span>
                            </td>
                            <td>
                                {{ $user->guru ? $user->guru->nama : "Tidak ada guru" }}
                            </td>
                            <td>
                                <a
                                    href="{{ route("users.edit", $user) }}"
                                    class="btn btn-warning btn-sm shadow-sm"
                                >
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    @if ($users->isEmpty())
                        <tr>
                            <td colspan="11" class="text-center">
                                Data Tidak Ditemukan
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-end">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
