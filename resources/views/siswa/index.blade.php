<x-app-layout>
    <div class="container mb-4">
        <h1 class="mb-4">Daftar Siswa</h1>
        <div class="d-flex justify-content-between mb-4">
            <!-- "Tambah Siswa" Button -->
            <a
                href="{{ route('siswa.create') }}"
                class="btn btn-success shadow-sm"
            >
                <i class="bi bi-person-plus"></i>
                Tambah Siswa
            </a>

            <!-- Search Form -->
            <form
                method="GET"
                action="{{ route('siswa.index') }}"
                class="d-flex flex-wrap gap-3"
            >
                <div class="form-group mb-0">
                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        class="form-control"
                        value="{{ old('nama', $nama) }}"
                        placeholder="Cari berdasarkan nama"
                    />
                </div>
                <div class="form-group mb-0">
                    <input
                        type="text"
                        id="nis"
                        name="nis"
                        class="form-control"
                        value="{{ old('nis', $nis) }}"
                        placeholder="Cari berdasarkan nis"
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
                                value="lulus"
                                {{ old('status', $status) == 'lulus' ? 'selected' : '' }}
                            >
                                Lulus
                            </option>
                            <option
                                value="belum lulus"
                                {{ old('status', $status) == 'belum lulus' ? 'selected' : '' }}
                            >
                                Belum Lulus
                            </option>
                        </select>
                    </div>
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

        <div class="table-responsive">
            <table
                class="table table-hover table-bordered table-striped table-sm shadow-sm rounded-3"
            >
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>NIS/NISN</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Tahun Masuk</th>
                        <th>Tahun Lulus</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $index => $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nis }}</td>
                            <td>{{ $item->tempat_lahir }}</td>
                            <td>{{ $item->tanggal_lahir }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->tahun_masuk }}</td>
                            <td>{{ $item->tahun_lulus ?? '-' }}</td>
                            <td>{{ $item->kelas->tingkat }}</td>
                            <td>
                                <span
                                    class="badge @if ($item->status == 'lulus') bg-success @elseif ($item->status == 'belum lulus') bg-warning @else bg-danger @endif"
                                >
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td>
                                <a
                                    href="{{ route('siswa.edit', $item) }}"
                                    class="btn btn-warning btn-sm shadow-sm"
                                >
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form
                                    id="delete-form-{{ $item->id }}"
                                    action="{{ route('siswa.destroy', $item) }}"
                                    method="POST"
                                    style="display: inline"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="button"
                                        class="btn btn-danger btn-sm shadow-sm"
                                        onclick="confirmDelete('{{ $item->id }}')"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($siswa->isEmpty())
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
            {{ $siswa->links() }}
        </div>
    </div>
</x-app-layout>
