<x-app-layout>
    <x-message></x-message>
    <div class="container">
        <h1>Tambah Guru</h1>
        <form action="{{ route('guru.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input
                    type="text"
                    class="form-control"
                    id="nama"
                    name="nama"
                    value="{{ old('nama') }}"
                />
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input
                    type="text"
                    class="form-control"
                    id="nip"
                    name="nip"
                    value="{{ old('nip') }}"
                />
                @error('nip')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tempat_lahir" class="form-label">
                    Tempat Lahir
                </label>
                <input
                    type="text"
                    class="form-control"
                    id="tempat_lahir"
                    name="tempat_lahir"
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
                    class="form-control"
                    id="tanggal_lahir"
                    name="tanggal_lahir"
                    value="{{ old('tanggal_lahir') }}"
                />
                @error('tanggal_lahir')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea
                    class="form-control"
                    id="alamat"
                    name="alamat"
                    value="{{ old('alamat') }}"
                ></textarea>
                @error('alamat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="mata_pelajaran" class="form-label">
                    Mata Pelajaran
                </label>
                <input
                    type="text"
                    class="form-control"
                    id="mata_pelajaran"
                    name="mata_pelajaran"
                    value="{{ old('mata_pelajaran') }}"
                />
                @error('mata_pelajaran')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</x-app-layout>
