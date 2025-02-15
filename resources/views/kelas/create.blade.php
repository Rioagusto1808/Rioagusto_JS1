<x-app-layout>
    <div class="container">
        <h1 class="mb-4">Tambah Kelas</h1>
        <x-message></x-message>
        <form
            action="{{ route('kelas.store') }}"
            method="POST"
            class="shadow-lg p-4 rounded-3 bg-light"
        >
            @csrf
            <div class="mb-3">
                <label for="tingkat" class="form-label">Tingkat</label>
                <input
                    type="text"
                    name="tingkat"
                    id="tingkat"
                    class="form-control"
                    value="{{ old('tingkat') }}"
                />
                @error('tingkat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kelas.index') }}" class="btn btn-secondary">
                Batal
            </a>
        </form>
    </div>
</x-app-layout>
