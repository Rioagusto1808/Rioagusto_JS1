<x-app-layout>
    <style>
        .form-control {
            min-width: 300px;
            max-width: 600px;
        }
        .form-select {
            min-width: 300px;
            max-width: 600px;
        }
    </style>
    <div class="container mb-4">
        <h1>Daftar Jadwal</h1>

        <div class="d-flex justify-content-between mb-4">
            <!-- "Tambah Siswa" Button -->
            <a
                href="{{ route('jadwal.create') }}"
                class="btn btn-success shadow-sm"
            >
                <i class="bi bi-person-plus"></i>
                Tambah Jadwal
            </a>

            <!-- Search Form -->
            <form
                method="GET"
                action="{{ route('jadwal.index') }}"
                class="d-flex flex-wrap gap-3"
            >
                <div class="form-group mb-0">
                    <input
                        type="text"
                        id="nama_jadwal"
                        name="nama_jadwal"
                        class="form-control"
                        value="{{ old('nama_jadwal', $nama_jadwal) }}"
                        placeholder="Cari berdasarkan nama jadwal"
                    />
                </div>
                <div class="form-group mb-0">
                    <div class="dropdown">
                        <select
                            name="kelas_id"
                            id="kelas_id"
                            class="form-select"
                            aria-label="Pilih Kelas"
                        >
                            <option value="">Pilih Kelas</option>
                            @foreach ($kelas as $k)
                                <option
                                    value="{{ $k->id }}"
                                    {{ old('kelas_id', $kelas_id) == $k->id ? 'selected' : '' }}
                                >
                                    {{ $k->tingkat }}
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
                                href="{{ route('jadwal.show', $jadwal) }}"
                                class="btn btn-info btn-sm"
                            >
                                <i class="bi bi-eye"></i>
                            </a>
                            <a
                                href="{{ route('jadwal.edit', $jadwal) }}"
                                class="btn btn-warning btn-sm"
                            >
                                <i class="bi bi-pencil-square"></i>
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
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if ($jadwals->isEmpty())
                    <tr>
                        <td colspan="11" class="text-center">
                            Data Tidak Ditemukan
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
