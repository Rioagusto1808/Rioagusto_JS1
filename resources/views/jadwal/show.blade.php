<x-app-layout>
    <div class="container">
        <h1 class="mb-4">Jadwal: {{ $jadwal->nama_jadwal }}</h1>

        <!-- Show Periode Jadwal -->
        <div class="mb-4">
            <strong>Kelas:</strong>
            {{ $jadwal->kelas->tingkat }}
            <strong>Periode:</strong>
            {{ \Carbon\Carbon::parse($jadwal->periode_mulai)->format('d M Y') }}
            -
            {{ \Carbon\Carbon::parse($jadwal->periode_selesai)->format('d M Y') }}
        </div>

        <!-- Table to show the schedule -->
        <h4 class="mb-3">Detail Jadwal</h4>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Kelas</th>
                    <th>Mata Pelajaran</th>
                    <th>Guru</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal->details as $detail)
                    <tr>
                        <td>{{ $detail->hari }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($detail->waktu_mulai)->format('H:i') }}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($detail->waktu_selesai)->format('H:i') }}
                        </td>
                        <td>{{ $detail->kelas->tingkat }}</td>
                        <td>{{ $detail->mataPelajaran->nama_mapel }}</td>
                        <td>{{ $detail->guru->nama }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('jadwal.index') }}" class="btn btn-primary mt-4">
            Kembali ke Daftar Jadwal
        </a>
    </div>
</x-app-layout>

<!-- Add some custom styling -->
<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    h1 {
        font-size: 2rem;
        font-weight: bold;
    }

    .mb-4 {
        margin-bottom: 1.5rem;
    }

    .table th,
    .table td {
        text-align: center;
    }

    .table th {
        background-color: #f8f9fa;
        color: #333;
        font-weight: bold;
    }

    .table-bordered {
        border: 1px solid #ddd;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .table-striped tbody tr:hover {
        background-color: #f1f1f1;
    }

    .btn-primary {
        background-color: #007bff;
        border: 1px solid #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>
