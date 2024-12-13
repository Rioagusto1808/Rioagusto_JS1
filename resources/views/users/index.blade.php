<x-app-layout>
    <div class="container">
        <h1>Tabel User</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">
            Add User
        </a>

        <table class="table table-striped">
            <thead>
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
                        <td>{{ $user->status }}</td>
                        <td>
                            {{ $user->roles->pluck('name')->implode(', ') }}
                        </td>
                        <td>
                            {{ $user->guru ? $user->guru->nama : 'Tidak ada guru' }}
                        </td>
                        <td>
                            <a
                                href="{{ route('users.edit', $user) }}"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>
                            <form
                                action="{{ route('users.destroy', $user) }}"
                                method="POST"
                                style="display: inline"
                            >
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')"
                                >
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
