<x-app-layout>
    <div class="container mb-4">
        <h1 class="mb-4">Tabel Guru</h1>
        <div class="d-flex justify-content-between mb-4">
            @if (Auth::user()->can('Superadmin'))
                <!-- "Tambah Siswa" Button -->
                <a
                    href="{{ route('guru.create') }}"
                    class="btn btn-success shadow-sm"
                >
                    <i class="bi bi-person-plus"></i>
                    Tambah Guru
                </a>
            @endif

            <!-- Search Form -->
            <form
                method="GET"
                action="{{ route('guru.index') }}"
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
                        id="nip"
                        name="nip"
                        class="form-control"
                        value="{{ old('nip', $nip) }}"
                        placeholder="Cari berdasarkan nip"
                    />
                </div>
                <div class="form-group mb-0">
                    <div class="dropdown">
                        <select
                            name="mapel_id"
                            id="mapel_id"
                            class="form-select"
                            aria-label="Pilih Kelas"
                        >
                            <option value="">Pilih Kelas</option>
                            @foreach ($mapels as $k)
                                <option
                                    value="{{ $k->id }}"
                                    {{ old('mapel_id', $mapel_id) == $k->id ? 'selected' : '' }}
                                >
                                    {{ $k->nama_mapel }}
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
                        <th>#</th>
                        <th>Name</th>
                        <th>NIP</th>
                        <th>Mata Pelajaran</th>
                        <th>Alamat</th>
                        @if (Auth::user()->can('Superadmin'))
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gurus as $index => $guru)
                        <tr>
                            <td>{{ $gurus->firstItem() + $index }}</td>
                            <td>{{ $guru->nama }}</td>
                            <td>{{ $guru->nip }}</td>
                            <td>{{ $guru->mataPelajaran->nama_mapel }}</td>
                            <td>{{ $guru->alamat }}</td>
                            @if (Auth::user()->can('Superadmin'))
                                <td>
                                    <a
                                        href="{{ route('guru.edit', $guru) }}"
                                        class="btn btn-warning btn-sm shadow-sm"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form
                                        id="delete-form-{{ $guru->id }}"
                                        action="{{ route('guru.destroy', $guru) }}"
                                        method="POST"
                                        style="display: inline"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm shadow-sm"
                                            onclick="confirmDelete('{{ $guru->id }}')"
                                        >
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach

                    @if ($gurus->isEmpty())
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
            {{ $gurus->links() }}
        </div>
    </div>
</x-app-layout>
