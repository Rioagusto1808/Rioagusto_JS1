<x-app-layout>
    <div class="container mb-4">
        <h1>Daftar Jadwal</h1>
        <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3">
            Tambah Jadwal
        </a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Jadwal</th>
                    <th>Kelas</th>
                    <th>Periode</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwals as $index => $jadwal)
                    <tr>
                        <td>{{ $jadwals->firstItem() + $index }}</td>
                        <td>{{ $jadwal->nama_jadwal }}</td>
                        <td>{{ $jadwal->kelas->tingkat }}</td>
                        <td>
                            {{ $jadwal->periode_mulai }} -
                            {{ $jadwal->periode_selesai }}
                        </td>
                        <td>
                            <a
                                href="{{ route('jadwal.edit', $jadwal) }}"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>
                            <a
                                href="{{ route('jadwal.show', $jadwal) }}"
                                class="btn btn-warning btn-sm"
                            >
                                Show
                            </a>
                            <form
                                action="{{ route('jadwal.destroy', $jadwal) }}"
                                method="POST"
                                style="display: inline-block"
                            >
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                >
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
