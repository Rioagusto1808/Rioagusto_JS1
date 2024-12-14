<x-app-layout>
    <div class="container mb-4">
        <h1>Daftar Mata Pelajaran</h1>
        <x-message></x-message>
        <a
            href="{{ route('mata_pelajaran.create') }}"
            class="btn btn-primary mb-3"
        >
            Tambah Mata Pelajaran
        </a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Mata Pelajaran</th>
                    <th>Kode</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mataPelajaran as $mapel)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mapel->nama_mapel }}</td>
                        <td>{{ $mapel->kode_mapel }}</td>
                        <td>
                            <a
                                href="{{ route('mata_pelajaran.edit', $mapel->id) }}"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>
                            <form
                                action="{{ route('mata_pelajaran.destroy', $mapel->id) }}"
                                method="POST"
                                class="d-inline"
                            >
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus?')"
                                >
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
