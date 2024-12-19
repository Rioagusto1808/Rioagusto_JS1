<x-app-layout>
    <div class="container mb-4">
        <h1 class="mb-4">Daftar Kelas</h1>
        <div class="d-flex justify-content-between mb-4">
            <!-- "Tambah Siswa" Button -->
            <a
                href="{{ route('kelas.create') }}"
                class="btn btn-success shadow-sm"
            >
                <i class="bi bi-person-plus"></i>
                Tambah Kelas
            </a>

            <!-- Search Form -->
            <form
                method="GET"
                action="{{ route('kelas.index') }}"
                class="d-flex flex-wrap gap-3"
            >
                <div class="form-group mb-0">
                    <input
                        type="text"
                        id="tingkat"
                        name="tingkat"
                        class="form-control"
                        value="{{ old('tingkat', $tingkat) }}"
                        placeholder="Cari berdasarkan tingkat"
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

                    @if ($kelas->isEmpty())
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
            {{ $kelas->links() }}
        </div>
    </div>
</x-app-layout>
