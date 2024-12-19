<x-app-layout>
    <div class="container mb-4">
        <h1 class="mb-4">Daftar Berita</h1>

        <div class="d-flex justify-content-between mb-4">
            <!-- "Tambah Siswa" Button -->
            <a
                href="{{ route("berita.create") }}"
                class="btn btn-success shadow-sm"
            >
                <i class="bi bi-person-plus"></i>
                Tambah Berita
            </a>

            <!-- Search Form -->
            <form
                method="GET"
                action="{{ route("berita.index") }}"
                class="d-flex flex-wrap gap-3"
            >
                <div class="form-group mb-0">
                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        class="form-control"
                        value="{{ old("judul", $judul) }}"
                        placeholder="Cari berdasarkan berita"
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
                                value="draft"
                                {{ old("status", $status) == "draft" ? "selected" : "" }}
                            >
                                Draft
                            </option>
                            <option
                                value="published"
                                {{ old("status", $status) == "published" ? "selected" : "" }}
                            >
                                Published
                            </option>
                            <option
                                value="archived"
                                {{ old("status", $status) == "archived" ? "selected" : "" }}
                            >
                                Archived
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
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beritas as $index => $berita)
                        <tr>
                            <td>{{ $beritas->firstItem() + $index }}</td>
                            <td>{{ Str::limit($berita->judul, 80) }}</td>
                            <td>{{ $berita->user->name }}</td>
                            <td>
                                <span
                                    class="badge @if ($berita->status == "published")
                                        bg-success
                                    @elseif ($berita->status == "draft")
                                        bg-warning
                                    @else
                                        bg-danger
                                    @endif"
                                >
                                    {{ ucfirst($berita->status) }}
                                </span>
                            </td>
                            <td>
                                <a
                                    href="{{ route("berita.show", $berita) }}"
                                    class="btn btn-info btn-sm shadow-sm"
                                >
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a
                                    href="{{ route("berita.edit", $berita) }}"
                                    class="btn btn-warning btn-sm shadow-sm"
                                >
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form
                                    id="delete-form-{{ $berita->id }}"
                                    action="{{ route("berita.destroy", $berita) }}"
                                    method="POST"
                                    style="display: inline"
                                >
                                    @csrf
                                    @method("DELETE")
                                    <button
                                        type="button"
                                        class="btn btn-danger btn-sm shadow-sm"
                                        onclick="confirmDelete('{{ $berita->id }}')"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($beritas->isEmpty())
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
            {{ $beritas->links() }}
        </div>
    </div>
</x-app-layout>
