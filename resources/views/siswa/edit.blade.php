<x-app-layout>
    <div class="container mb-3">
        <h1 class="mb-4">Edit Siswa</h1>
        <form
            action="{{ route('siswa.update', $siswa->id) }}"
            method="POST"
            class="shadow-lg p-4 rounded-3 bg-light"
        >
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input
                    type="text"
                    name="nama"
                    id="nama"
                    class="form-control"
                    value="{{ old('nama', $siswa->nama) }}"
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
                    value="{{ old('nama_panggilan', $siswa->nama_panggilan) }}"
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
                    value="{{ old('nis', $siswa->nis) }}"
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
                        {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'laki' ? 'selected' : '' }}
                    >
                        Laki-laki
                    </option>
                    <option
                        value="perempuan"
                        {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}
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
                    value="{{ old('tempat_lahir', $siswa->tempat_lahir) }}"
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
                    value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}"
                />
                @error('tanggal_lahir')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Agama</label>
                <select name="agama" class="form-control">
                    <option
                        value="islam"
                        {{ old('agama', $siswa->agama) == 'islam' ? 'selected' : '' }}
                    >
                        Islam
                    </option>
                    <option
                        value="kristen"
                        {{ old('agama', $siswa->agama) == 'kristen' ? 'selected' : '' }}
                    >
                        Kristen
                    </option>
                    <option
                        value="katolik"
                        {{ old('agama', $siswa->agama) == 'katolik' ? 'selected' : '' }}
                    >
                        Katolik
                    </option>
                    <option
                        value="hindu"
                        {{ old('agama', $siswa->agama) == 'hindu' ? 'selected' : '' }}
                    >
                        Hindu
                    </option>
                    <option
                        value="buddha"
                        {{ old('agama', $siswa->agama) == 'buddha' ? 'selected' : '' }}
                    >
                        Buddha
                    </option>
                    <option
                        value="konghucu"
                        {{ old('agama', $siswa->agama) == 'konghucu' ? 'selected' : '' }}
                    >
                        Konghucu
                    </option>
                </select>
                @error('agama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control">
                    {{ old('alamat', $siswa->alamat) }}
                </textarea>
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
                    class="form-control"
                    value="{{ old('ayah', $siswa->ayah) }}"
                />
                @error('ayah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ibu">Nama Ibu</label>
                <input
                    type="text"
                    name="ibu"
                    class="form-control"
                    value="{{ old('ibu', $siswa->ibu) }}"
                />
                @error('ibu')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                <input
                    type="text"
                    name="pekerjaan_ayah"
                    class="form-control"
                    value="{{ old('pekerjaan_ayah', $siswa->pekerjaan_ayah) }}"
                />
                @error('pekerjaan_ayah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                <input
                    type="text"
                    name="pekerjaan_ibu"
                    class="form-control"
                    value="{{ old('pekerjaan_ibu', $siswa->pekerjaan_ibu) }}"
                />
                @error('pekerjaan_ibu')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat_orang_tua">Alamat Orang Tua</label>
                <textarea name="alamat_orang_tua" class="form-control">
        {{ old('alamat_orang_tua', trim($siswa->alamat_orang_tua)) }}
    </textarea
                >

                @error('alamat_orang_tua')
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
                    value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}"
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
                    value="{{ old('tahun_lulus', $siswa->tahun_lulus) }}"
                />
                @error('tahun_lulus')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kelas_id" class="form-label">Kelas</label>
                <select name="kelas_id" class="form-control">
                    @foreach ($kelas as $kelasItem)
                        <option
                            value="{{ $kelasItem->id }}"
                            {{ $siswa->kelas_id == $kelasItem->id ? 'selected' : '' }}
                        >
                            {{ $kelasItem->tingkat }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <option
                        value="belum lulus"
                        {{ old('status', $siswa->status) == 'belum lulus' ? 'selected' : '' }}
                    >
                        Belum Lulus
                    </option>
                    <option
                        value="lulus"
                        {{ old('status', $siswa->status) == 'lulus' ? 'selected' : '' }}
                    >
                        Lulus
                    </option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Wali Kelas</label>
                <select name="guru_id" class="form-control">
                    @foreach ($guru as $guru)
                        <option
                            value="{{ $guru->id }}"
                            {{ old('guru_id', $siswa->guru_id) == $guru->id ? 'selected' : '' }}
                        >
                            {{ $guru->nama }}
                        </option>
                    @endforeach
                </select>
                @error('guru_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</x-app-layout>
