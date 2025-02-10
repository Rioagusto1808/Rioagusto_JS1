<x-app-layout>
    <div class="container mb-4">
        <h1 class="mb-4">Detail Siswa</h1>

        <div class="card shadow-sm rounded-3">
            <div class="card-header bg-primary text-white">
                Informasi Siswa
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th style="width: 200px;">Nama Lengkap</th>
                        <td>{{ $siswa->nama }}</td>
                    </tr>
                    <tr>
                        <th>Nama Panggilan</th>
                        <td>{{ $siswa->nama_panggilan }}</td>
                    </tr>
                    <tr>
                        <th>NIS/NISN</th>
                        <td>{{ $siswa->nis }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Lahir</th>
                        <td>{{ $siswa->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $siswa->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ ucfirst($siswa->jenis_kelamin) }}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>{{ ucfirst($siswa->agama) }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $siswa->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Tahun Masuk</th>
                        <td>{{ $siswa->tahun_masuk }}</td>
                    </tr>
                    <tr>
                        <th>Tahun Lulus</th>
                        <td>{{ $siswa->tahun_lulus ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>{{ $siswa->kelas->tingkat ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Wali Kelas</th>
                        <td>{{ $siswa->waliKelas->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span
                                class="badge @if ($siswa->status == 'lulus') bg-success @elseif ($siswa->status == 'belum lulus') bg-warning @else bg-danger @endif"
                            >
                                {{ ucfirst($siswa->status) }}
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
</x-app-layout>
