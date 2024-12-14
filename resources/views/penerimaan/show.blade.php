<x-app-layout>
    <div class="container">
        <h1>Detail Penerimaan Siswa Baru</h1>
        <x-message></x-message>
        <div class="card">
            <div class="card-header">
                <h4>Data Siswa</h4>
            </div>
            <div class="card-body">
                <p>
                    <strong>Nama:</strong>
                    {{ $siswa->nama }}
                </p>
                <p>
                    <strong>NISN:</strong>
                    {{ $siswa->nisn }}
                </p>
                <p>
                    <strong>Tempat Lahir:</strong>
                    {{ $siswa->tempat_lahir }}
                </p>
                <p>
                    <strong>Tanggal Lahir:</strong>
                    {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d-m-Y') }}
                </p>
                <p>
                    <strong>Alamat:</strong>
                    {{ $siswa->alamat }}
                </p>
                <p>
                    <strong>Status:</strong>
                    {{ ucfirst($siswa->status) }}
                </p>
            </div>
        </div>

        <a
            href="{{ route('penerimaan.index') }}"
            class="btn btn-secondary mt-3"
        >
            Kembali ke Daftar Siswa
        </a>
    </div>
</x-app-layout>
