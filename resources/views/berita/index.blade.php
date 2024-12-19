<x-app-layout>
    <div class="container mb-4">
        <h1 class="mb-4">Daftar Berita</h1>

        <a
            href="{{ route("berita.create") }}"
            class="btn btn-success mb-4 shadow-sm"
        >
            <i class="bi bi-person-plus"></i>
            Tambah Berita
        </a>

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
                            <td>{{ $berita->judul }}</td>
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
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-end">
            {{ $beritas->links() }}
        </div>
    </div>
</x-app-layout>
