<x-app-layout>
    <div class="container">
        <h1 class="mb-4">Edit Penerimaan Siswa</h1>
        <form
            action="{{ route('penerimaan.update', $siswa) }}"
            method="POST"
            class="shadow-lg p-4 rounded-3 bg-light"
        >
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input
                    type="text"
                    name="nama"
                    class="form-control"
                    value="{{ $siswa->nama }}"
                    required
                />
            </div>

            <div class="mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <input
                    type="text"
                    name="nisn"
                    class="form-control"
                    value="{{ $siswa->nisn }}"
                    required
                />
            </div>

            <div class="mb-3">
                <label for="tempat_lahir" class="form-label">
                    Tempat Lahir
                </label>
                <input
                    type="text"
                    name="tempat_lahir"
                    class="form-control"
                    value="{{ $siswa->tempat_lahir }}"
                    required
                />
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">
                    Tanggal Lahir
                </label>
                <input
                    type="date"
                    name="tanggal_lahir"
                    class="form-control"
                    value="{{ $siswa->tanggal_lahir }}"
                    required
                />
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" required>
{{ $siswa->alamat }}</textarea
                >
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option
                        value="diterima"
                        {{ $siswa->status == 'diterima' ? 'selected' : '' }}
                    >
                        Diterima
                    </option>
                    <option
                        value="ditolak"
                        {{ $siswa->status == 'ditolak' ? 'selected' : '' }}
                    >
                        Ditolak
                    </option>
                    <option
                        value="menunggu"
                        {{ $siswa->status == 'menunggu' ? 'selected' : '' }}
                    >
                        Menunggu
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</x-app-layout>
