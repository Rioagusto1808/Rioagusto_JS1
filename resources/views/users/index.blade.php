<x-app-layout>
    <div class="container mb-4">
        <h1 class="mb-4">Tabel User</h1>

        <a
            href="{{ route("users.create") }}"
            class="btn btn-success mb-4 shadow-sm"
        >
            <i class="bi bi-person-plus"></i>
            Tambah User
        </a>

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
                                <form
                                    id="delete-form-{{ $user->id }}"
                                    action="{{ route("users.destroy", $user) }}"
                                    method="POST"
                                    style="display: inline"
                                >
                                    @csrf
                                    @method("DELETE")
                                    <button
                                        type="button"
                                        class="btn btn-danger btn-sm shadow-sm"
                                        onclick="confirmDelete('{{ $user->id }}')"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-end">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
