<x-app-layout>
    <div class="container mb-4">
        <h1>Penerimaan Siswa Baru</h1>
        <a
            href="{{ route("penerimaan.create") }}"
            class="btn btn-success mb-4 shadow-sm"
        >
            <i class="bi bi-person-plus"></i>
            Tambah Siswa Baru
        </a>

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
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-end">
            {{ $siswa->links() }}
        </div>
    </div>
</x-app-layout>
