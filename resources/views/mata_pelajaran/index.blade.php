<x-app-layout>
    <div class="container mb-4">
        <h1 class="mb-4">Daftar Mata Pelajaran</h1>
        <a
            href="{{ route('mata_pelajaran.create') }}"
            class="btn btn-success mb-3"
        >
           <i class="bi bi-person-plus"></i> Tambah Mata Pelajaran
        </a>
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
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="d-flex justify-content-end">
            {{ $mataPelajaran->links() }}
        </div>

    </div>
</x-app-layout>

