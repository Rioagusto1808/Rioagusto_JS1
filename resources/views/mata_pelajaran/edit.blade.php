<x-app-layout>
    <div class="container">
        <h1>Edit Mata Pelajaran</h1>
        <x-message></x-message>
        <form
            action="{{ route('mata_pelajaran.update', $mataPelajaran->id) }}"
            method="POST"
        >
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_mapel" class="form-label">
                    Nama Mata Pelajaran
                </label>
                <input
                    type="text"
                    name="nama_mapel"
                    id="nama_mapel"
                    class="form-control"
                    value="{{ $mataPelajaran->nama_mapel }}"
                />
                @error('nama_mapel')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kode_mapel" class="form-label">
                    Kode Mata Pelajaran
                </label>
                <input
                    type="text"
                    name="kode_mapel"
                    id="kode_mapel"
                    class="form-control"
                    value="{{ $mataPelajaran->kode_mapel }}"
                />
                @error('kode_mapel')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>
            <a
                href="{{ route('mata_pelajaran.index') }}"
                class="btn btn-secondary"
            >
                Batal
            </a>
        </form>
    </div>
</x-app-layout>
