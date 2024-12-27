<x-app-layout>
    <div class="container mb-3">
        <h1 class="mb-4">Tambah Siswa</h1>
        <form
            action="{{ route('siswa.store') }}"
            method="POST"
            class="shadow-lg p-4 rounded-3 bg-light"
        >
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
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
                <label>Nama Panggilan</label>
                <input
                    type="text"
                    name="nama_panggilan"
                    class="form-control"
                    value="{{ old('nama_panggilan') }}"
                />
                @error('nama_panggilan')
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
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option
                        value="laki"
                        {{ old('jenis_kelamin') == 'laki' ? 'selected' : '' }}
                    >
                        Laki-laki
                    </option>
                    <option
                        value="perempuan"
                        {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}
                    >
                        Perempuan
                    </option>
                </select>
                @error('jenis_kelamin')
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
                <label>Agama</label>
                <select
                    name="agama"
                    class="form-control @error('agama') is-invalid @enderror"
                >
                    <option value="">-- Pilih Agama --</option>
                    <option
                        value="islam"
                        {{ old('agama') == 'islam' ? 'selected' : '' }}
                    >
                        Islam
                    </option>
                    <option
                        value="kristen"
                        {{ old('agama') == 'kristen' ? 'selected' : '' }}
                    >
                        Kristen
                    </option>
                    <option
                        value="katolik"
                        {{ old('agama') == 'katolik' ? 'selected' : '' }}
                    >
                        Katolik
                    </option>
                    <option
                        value="hindu"
                        {{ old('agama') == 'hindu' ? 'selected' : '' }}
                    >
                        Hindu
                    </option>
                    <option
                        value="buddha"
                        {{ old('agama') == 'buddha' ? 'selected' : '' }}
                    >
                        Buddha
                    </option>
                    <option
                        value="konghucu"
                        {{ old('agama') == 'konghucu' ? 'selected' : '' }}
                    >
                        Konghucu
                    </option>
                </select>
                @error('agama')
                    <div class="invalid-feedback">{{ $message }}</div>
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

            <h4>Data Orang Tua</h4>
            <div class="mb-3">
                <label for="ayah">Nama Ayah</label>
                <input
                    type="text"
                    name="ayah"
                    class="form-control @error('ayah') is-invalid @enderror"
                    value="{{ old('ayah') }}"
                />
                @error('ayah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ibu">Nama Ibu</label>
                <input
                    type="text"
                    name="ibu"
                    class="form-control @error('ibu') is-invalid @enderror"
                    value="{{ old('ibu') }}"
                />
                @error('ibu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                <input
                    type="text"
                    name="pekerjaan_ayah"
                    class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                    value="{{ old('pekerjaan_ayah') }}"
                />
                @error('pekerjaan_ayah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                <input
                    type="text"
                    name="pekerjaan_ibu"
                    class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                    value="{{ old('pekerjaan_ibu') }}"
                />
                @error('pekerjaan_ibu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="alamat_orang_tua">Alamat Orang Tua</label>
                <textarea
                    name="alamat_orang_tua"
                    class="form-control @error('alamat_orang_tua') is-invalid @enderror"
                >
{{ old('alamat_orang_tua') }}</textarea
                >
                @error('alamat_orang_tua')
                    <div class="invalid-feedback">{{ $message }}</div>
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
                <label for="kelas_id" class="form-label">Kelas</label>
                <select name="kelas_id" class="form-control">
                    @foreach ($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}">
                            {{ $kelasItem->tingkat }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="">-- Pilih Status --</option>
                    <option
                        value="belum lulus"
                        {{ old('status') == 'belum lulus' ? 'selected' : '' }}
                    >
                        Belum Lulus
                    </option>
                    <option
                        value="lulus"
                        {{ old('status') == 'lulus' ? 'selected' : '' }}
                    >
                        Lulus
                    </option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Wali Kelas</label>
                <select
                    name="guru_id"
                    class="form-control @error('guru_id') is-invalid @enderror"
                >
                    <option value="">-- Pilih Guru --</option>
                    @foreach ($guru as $guru)
                        <option
                            value="{{ $guru->id }}"
                            {{ old('guru_id') == $guru->id ? 'selected' : '' }}
                        >
                            {{ $guru->nama }}
                        </option>
                    @endforeach
                </select>
                @error('guru_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</x-app-layout>
