<x-app-layout>
    <style>
        .form-control {
            max-width: 500px; /* Atur panjang maksimum input */
            min-width: 300px;
        }
    </style>
    <div class="container mb-4">
        <h1 class="mb-4">Daftar Mata Pelajaran</h1>
        <div class="d-flex justify-content-between mb-4">
            <!-- "Tambah Siswa" Button -->
            <a
                href="{{ route('mata_pelajaran.create') }}"
                class="btn btn-success shadow-sm"
            >
                <i class="bi bi-person-plus"></i>
                Tambah Mata Pelajaran
            </a>

            <!-- Search Form -->
            <form
                method="GET"
                action="{{ route('mata_pelajaran.index') }}"
                class="d-flex flex-wrap gap-3"
            >
                <div class="form-group mb-0 flex-grow-1">
                    <input
                        type="text"
                        id="nama_mapel"
                        name="nama_mapel"
                        class="form-control w-100"
                        value="{{ old('nama_mapel', $nama_mapel) }}"
                        placeholder="Cari berdasarkan nama mapel"
                    />
                </div>
                <div class="form-group mb-0">
                    <input
                        type="text"
                        id="kode_mapel"
                        name="kode_mapel"
                        class="form-control w-500"
                        value="{{ old('kode_mapel', $kode_mapel) }}"
                        placeholder="Cari berdasarkan kode mata pelajaran"
                    />
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
                        <th>#</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>Kode</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mataPelajaran as $index => $mapel)
                        <tr>
                            <td>{{ $mataPelajaran->firstItem() + $index }}</td>
                            <td>{{ $mapel->nama_mapel }}</td>
                            <td>{{ $mapel->kode_mapel }}</td>
                            <td>
                                <a
                                    href="{{ route('mata_pelajaran.edit', $mapel->id) }}"
                                    class="btn btn-warning btn-sm"
                                >
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form
                                    id="delete-form-{{ $mapel->id }}"
                                    action="{{ route('mata_pelajaran.destroy', $mapel) }}"
                                    method="POST"
                                    style="display: inline"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="button"
                                        class="btn btn-danger btn-sm shadow-sm"
                                        onclick="confirmDelete('{{ $mapel->id }}')"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($mataPelajaran->isEmpty())
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
            {{ $mataPelajaran->links() }}
        </div>
    </div>
</x-app-layout>
