<x-app-layout>
    <div class="container mb-4">
        <h1 class="mb-4">Tabel Guru</h1>
        <a
            href="{{ route('guru.create') }}"
            class="btn btn-success mb-4 shadow-sm"
        >
            <i class="bi bi-person-plus"></i>
            Tambah Guru
        </a>

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
                        <th>Action</th>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-end">
            {{ $gurus->links() }}
        </div>
    </div>
</x-app-layout>
