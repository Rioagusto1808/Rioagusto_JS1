<x-app-layout>
    <div class="container">
        <h1 class="mb-4">Tambah Siswa</h1>
        <x-message></x-message>
        <form
            action="{{ route('siswa.store') }}"
            method="POST"
            class="shadow-lg p-4 rounded-3 bg-light"
        >
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input
                    type="text"
                    name="nama"
                    id="nama"
                    class="form-control"
                    value="{{ old('nama') }}"
                />
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input
                    type="text"
                    name="nis"
                    id="nis"
                    class="form-control"
                    value="{{ old('nis') }}"
                />
                @error('nis')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tempat_lahir" class="form-label">
                    Tempat Lahir
                </label>
                <input
                    type="text"
                    name="tempat_lahir"
                    id="tempat_lahir"
                    class="form-control"
                    value="{{ old('tempat_lahir') }}"
                />
                @error('tempat_lahir')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">
                    Tanggal Lahir
                </label>
                <input
                    type="date"
                    name="tanggal_lahir"
                    id="tanggal_lahir"
                    class="form-control"
                    value="{{ old('tanggal_lahir') }}"
                />
                @error('tanggal_lahir')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control">
{{ old('alamat') }}</textarea
                >
                @error('alamat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                <input
                    type="number"
                    name="tahun_masuk"
                    id="tahun_masuk"
                    class="form-control"
                    value="{{ old('tahun_masuk') }}"
                />
                @error('tahun_masuk')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                <input
                    type="number"
                    name="tahun_lulus"
                    id="tahun_lulus"
                    class="form-control"
                    value="{{ old('tahun_lulus') }}"
                />
                @error('tahun_lulus')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input
                    type="text"
                    name="kelas"
                    id="tahun_lulus"
                    class="form-control"
                    value="{{ old('kelas') }}"
                />
                @error('kelas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <option
                        value="lulus"
                        {{ old('status') == 'lulus' ? 'selected' : '' }}
                    >
                        Lulus
                    </option>
                    <option
                        value="belum lulus"
                        {{ old('status') == 'belum lulus' ? 'selected' : '' }}
                    >
                        Belum Lulus
                    </option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</x-app-layout>
