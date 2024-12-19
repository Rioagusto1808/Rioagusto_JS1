<x-app-layout>
    <div class="container mb-4">
        <h1 class="mb-4">Daftar Siswa</h1>

        <a
            href="{{ route("siswa.create") }}"
            class="btn btn-success mb-4 shadow-sm"
        >
            <i class="bi bi-person-plus"></i>
            Tambah Siswa
        </a>
        <div class="table-responsive">
            <table
                class="table table-hover table-bordered table-striped table-sm shadow-sm rounded-3"
            >
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>NIS/NISN</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Tahun Masuk</th>
                        <th>Tahun Lulus</th>
                        <th>kelas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $index => $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nis }}</td>
                            <td>{{ $item->tempat_lahir }}</td>
                            <td>{{ $item->tanggal_lahir }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->tahun_masuk }}</td>
                            <td>{{ $item->tahun_lulus ?? "-" }}</td>
                            <td>{{ $item->kelas->tingkat }}</td>
                            <td>
                                <span
                                    class="badge @if ($item->status == "lulus")
                                        bg-success
                                    @elseif ($item->status == "belum lulus")
                                        bg-warning
                                    @else
                                        bg-danger
                                    @endif"
                                >
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td>
                                <a
                                    href="{{ route("siswa.edit", $item) }}"
                                    class="btn btn-warning btn-sm shadow-sm"
                                >
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form
                                    id="delete-form-{{ $item->id }}"
                                    action="{{ route("siswa.destroy", $item) }}"
                                    method="POST"
                                    style="display: inline"
                                >
                                    @csrf
                                    @method("DELETE")
                                    <button
                                        type="button"
                                        class="btn btn-danger btn-sm shadow-sm"
                                        onclick="confirmDelete('{{ $item->id }}')"
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
            {{ $siswa->links() }}
        </div>
    </div>
</x-app-layout>
