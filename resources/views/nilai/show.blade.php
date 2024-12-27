<x-app-layout>
    <div class="container">
        <h1 class="text-center my-4 text-primary">Detail Nilai Rapor</h1>

        <div class="card shadow-lg">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">Data Nilai</h4>
            </div>
            <div class="card-body">
                <div class="flex mb-3">
                    <div class="col-md-4">
                        <p>
                            <strong>Siswa:</strong>
                            {{ $nilai->siswa->nama }}
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p>
                            <strong>Wali Kelas:</strong>
                            {{ $nilai->guru->nama }}
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p>
                            <strong>Tahun Ajaran:</strong>
                            {{ $nilai->tahun_ajaran }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <strong>Semester:</strong>
                            {{ $nilai->semester }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="mt-4 text-center text-success">Detail Mata Pelajaran</h3>

        <table class="table table-striped table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Guru Mata Pelajaran</th>
                    <th>Mata Pelajaran</th>
                    <th>Nilai</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilai->detailNilai as $detail)
                    <tr>
                        <td>{{ $detail->guru->nama }}</td>
                        <td>{{ $detail->mataPelajaran->nama_mapel }}</td>
                        <td>{{ $detail->nilai }}</td>
                        <td>{{ $detail->keterangan }}</td>
                    </tr>
                @endforeach

                <!-- Baris Rata-Rata Nilai -->
                @php
                    $rataRata = $nilai->detailNilai->avg('nilai');
                    $keterangan = '';

                    if ($rataRata >= 90) {
                        $keterangan = 'Sangat Baik';
                    } elseif ($rataRata >= 80) {
                        $keterangan = 'Baik';
                    } elseif ($rataRata >= 70) {
                        $keterangan = 'Cukup';
                    } else {
                        $keterangan = 'Kurang';
                    }
                @endphp

                <tr class="font-weight-bold bg-light">
                    <th colspan="2" class="text-end">Rata-rata Nilai</th>
                    <td>{{ number_format($rataRata, 2) }}</td>
                    <td>{{ $keterangan }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Tabel Kehadiran -->
        <h3 class="mt-4 text-center text-success" style="width: 30%">
            Ketidakhadiran Siswa
        </h3>

        <table
            class="table table-striped table-bordered mt-3"
            style="width: 30%"
        >
            <thead class="table-dark">
                <tr>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Sakit</td>
                    <td>{{ $ketidakhadiran->sakit ?? 0 }}</td>
                </tr>
                <tr>
                    <td>Izin</td>
                    <td>{{ $ketidakhadiran->izin ?? 0 }}</td>
                </tr>
                <tr>
                    <td>Tanpa Keterangan</td>
                    <td>{{ $ketidakhadiran->tanpa_keterangan ?? 0 }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Indikator Keterangan -->
        <div class="alert alert-info mt-4" role="alert">
            <strong>Indikator Penilaian:</strong>
            <br />
            - Nilai di atas 90: Sangat Baik
            <br />
            - Nilai 80-89: Baik
            <br />
            - Nilai 70-79: Cukup
            <br />
            - Nilai di bawah 70: Kurang
        </div>
    </div>
</x-app-layout>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
    }

    .card {
        border-radius: 15px;
        overflow: hidden;
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
        font-size: 18px;
        font-weight: bold;
    }

    .card-body p {
        font-size: 16px;
    }

    .table th,
    .table td {
        text-align: center;
        vertical-align: middle;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f1f1f1;
    }

    .table-dark {
        background-color: #343a40;
        color: white;
    }

    .table-dark th {
        color: #fff;
    }

    .alert-info {
        background-color: #e9f7fd;
        border-color: #b8daff;
    }

    h3 {
        color: #28a745;
        font-size: 22px;
        font-weight: bold;
    }

    h1 {
        font-size: 32px;
        font-weight: bold;
        color: #007bff;
    }

    .text-primary {
        color: #007bff;
    }

    .text-success {
        color: #28a745;
    }
</style>
