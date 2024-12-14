<x-app-layout>
    <div class="container mb-4">
        <h1 class="mb-4">Daftar Kelas</h1>
        <a
            href="{{ route('kelas.create') }}"
            class="btn btn-success mb-4 shadow-sm"
        >
            <i class="bi bi-person-plus"></i>
            Tambah Kelas
        </a>

        <div class="table-responsive">
            <table
                class="table table-hover table-bordered table-striped table-sm shadow-sm rounded-3"
            >
                <thead class="bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>Tingkat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $index => $kls)
                        <tr>
                            <td>{{ $kelas->firstItem() + $index }}</td>
                            <td>{{ $kls->tingkat }}</td>
                            <td>
                                <a
                                    href="{{ route('kelas.edit', $kls->id) }}"
                                    class="btn btn-warning btn-sm"
                                >
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form
                                    id="delete-form-{{ $kls->id }}"
                                    action="{{ route('kelas.destroy', $kls) }}"
                                    method="POST"
                                    style="display: inline"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="button"
                                        class="btn btn-danger btn-sm shadow-sm"
                                        onclick="confirmDelete('{{ $kls->id }}')"
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
            {{ $kelas->links() }}
        </div>
    </div>
</x-app-layout>
