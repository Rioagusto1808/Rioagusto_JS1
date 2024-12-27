<x-app-layout>
    <div class="container mt-5">
        <!-- Show Periode Jadwal -->
        <div class="card shadow-lg rounded-lg mb-4">
            <div
                class="card-header bg-gradient-primary text-white text-center"
            ></div>
            <div class="card-body">
                <div class="mb-4">
                    <h3 class="font-weight-bold">Jadwal:</h3>
                    <p class="text-muted">{{ $jadwal->nama_jadwal }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="font-weight-bold">Kelas:</h3>
                    <p class="text-muted">{{ $jadwal->kelas->tingkat }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="font-weight-bold">Periode:</h3>
                    <p class="badge bg-info">
                        {{ \Carbon\Carbon::parse($jadwal->periode_mulai)->format('d M Y') }}
                        -
                        {{ \Carbon\Carbon::parse($jadwal->periode_selesai)->format('d M Y') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Table to show the schedule -->
        <h4 class="mb-4 font-weight-bold">Detail Jadwal</h4>
        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-light">
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
<style>
    /* General container styling */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Card Styling */
    .card {
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    /* Gradient Background for Card Header */
    .bg-gradient-primary {
        background: linear-gradient(45deg, #2575fc 0%, #2575fc 100%);
    }

    /* Font Styling */
    .font-weight-bold {
        font-weight: 700;
    }

    /* Header Styling */
    h2 {
        font-size: 1.8rem;
    }

    /* Table Styling */
    .table th,
    .table td {
        text-align: center;
        padding: 10px;
    }

    .table th {
        background-color: #f8f9fa;
        color: #333;
        font-weight: bold;
    }

    .table-bordered {
        border: 1px solid #ddd;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    /* Badge Styling for Period */
    .badge.bg-info {
        background-color: #17a2b8;
    }

    /* Button Styling */
    .btn-primary {
        background-color: #007bff;
        border: 1px solid #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-warning {
        background-color: #ffc107;
        border: 1px solid #ffc107;
        color: white;
    }

    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #e0a800;
    }

    /* Hover Effect for Table Rows */
    .table-striped tbody tr:hover {
        background-color: #e2e6ea;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .table th,
        .table td {
            font-size: 0.9rem;
        }
    }
</style>
