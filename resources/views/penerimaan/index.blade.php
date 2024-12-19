<x-app-layout>
    <div class="container mb-4">
        <h1>Penerimaan Siswa Baru</h1>
        <div class="d-flex justify-content-between mb-4">
            <!-- "Tambah Siswa" Button -->
            <a
                href="{{ route("penerimaan.create") }}"
                class="btn btn-success shadow-sm"
            >
                <i class="bi bi-person-plus"></i>
                Tambah Penerimaan
            </a>

            <!-- Search Form -->
            <form
                method="GET"
                action="{{ route("penerimaan.index") }}"
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
                        id="nisn"
                        name="nisn"
                        class="form-control"
                        value="{{ old("nisn", $nisn) }}"
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
                                value="diterima"
                                {{ old("status", $status) == "diterima" ? "selected" : "" }}
                            >
                                Diterima
                            </option>
                            <option
                                value="menunggu"
                                {{ old("status", $status) == "menunggu" ? "selected" : "" }}
                            >
                                Menunggu
                            </option>
                            <option
                                value="ditolak"
                                {{ old("status", $status) == "ditolak" ? "selected" : "" }}
                            >
                                Ditolak
                            </option>
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
                        <th>Nama</th>
                        <th>NIS/NISN</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $index => $s)
                        <tr>
                            <td>{{ $siswa->firstItem() + $index }}</td>
                            <td>{{ $s->nama }}</td>
                            <td>{{ $s->nisn }}</td>
                            <td>{{ $s->tempat_lahir }}</td>
                            <td>{{ $s->tanggal_lahir }}</td>
                            <td>{{ $s->alamat }}</td>
                            <td>
                                <span
                                    class="badge @if ($s->status == "diterima")
                                        bg-success
                                    @elseif ($s->status == "menunggu")
                                        bg-warning
                                    @else
                                        bg-danger
                                    @endif"
                                >
                                    {{ ucfirst($s->status) }}
                                </span>
                            </td>
                            <td>
                                <a
                                    href="{{ route("penerimaan.show", $s) }}"
                                    class="btn btn-info btn-sm shadow-sm"
                                >
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a
                                    href="{{ route("penerimaan.edit", $s) }}"
                                    class="btn btn-warning btn-sm shadow-sm"
                                >
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form
                                    id="delete-form-{{ $s->id }}"
                                    action="{{ route("penerimaan.destroy", $s) }}"
                                    method="POST"
                                    style="display: inline"
                                >
                                    @csrf
                                    @method("DELETE")
                                    <button
                                        type="button"
                                        class="btn btn-danger btn-sm shadow-sm"
                                        onclick="confirmDelete('{{ $s->id }}')"
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
