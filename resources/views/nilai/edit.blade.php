<x-app-layout>
    <div class="container mb-3">
        <h1 class="mb-4">Edit Nilai</h1>

        <form
            action="{{ route('nilai.update', $nilai->id) }}"
            method="POST"
            class="shadow-lg p-4 rounded-3 bg-light"
        >
            @csrf
            @method('PUT')

            <!-- Dropdown Siswa -->
            <div class="form-group mb-3">
                <label for="siswa_id">Siswa</label>
                <select
                    name="siswa_id"
                    id="siswa_id"
                    class="form-control @error('siswa_id') is-invalid @enderror"
                >
                    <option value="">--Pilih Siswa--</option>
                    @foreach ($siswa as $s)
                        <option
                            value="{{ $s->id }}"
                            {{ old('siswa_id', $nilai->siswa_id) == $s->id ? 'selected' : '' }}
                        >
                            {{ $s->nama }}
                        </option>
                    @endforeach
                </select>
                @error('siswa_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Dropdown Guru -->
            <div class="form-group mb-3">
                <label for="guru_id">Wali Kelas</label>
                <select
                    name="guru_id"
                    id="guru_id"
                    class="form-control @error('guru_id') is-invalid @enderror"
                >
                    <option value="">--Pilih Guru--</option>
                    @foreach ($guru as $g)
                        <option
                            value="{{ $g->id }}"
                            {{ old('guru_id', $nilai->guru_id) == $g->id ? 'selected' : '' }}
                        >
                            {{ $g->nama }}
                        </option>
                    @endforeach
                </select>
                @error('guru_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input Tahun Ajaran -->
            <div class="form-group mb-3">
                <label for="tahun_ajaran">Tahun Ajaran</label>
                <input
                    type="text"
                    name="tahun_ajaran"
                    id="tahun_ajaran"
                    class="form-control @error('tahun_ajaran') is-invalid @enderror"
                    value="{{ old('tahun_ajaran', $nilai->tahun_ajaran) }}"
                />
                @error('tahun_ajaran')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input Semester -->
            <div class="form-group mb-3">
                <label for="semester">Semester</label>
                <input
                    type="number"
                    name="semester"
                    id="semester"
                    class="form-control @error('semester') is-invalid @enderror"
                    value="{{ old('semester', $nilai->semester) }}"
                />
                @error('semester')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Detail Nilai Dinamis -->
            <h3>Detail Nilai</h3>
            <div id="detail-nilai">
                @foreach ($nilai->detailNilai as $index => $detail)
                    <div class="detail-item">
                        <input
                            type="hidden"
                            name="detail_nilai[{{ $index }}][id]"
                            value="{{ $detail->id }}"
                        />
                        <div class="form-group mb-3">
                            <label>Guru</label>
                            <select
                                name="detail_nilai[{{ $index }}][guru_id]"
                                class="form-control"
                            >
                                <option value="">--Pilih Guru--</option>
                                @foreach ($guru as $gru)
                                    <option
                                        value="{{ $gru->id }}"
                                        {{ $detail->guru_id == $gru->id ? 'selected' : '' }}
                                    >
                                        {{ $gru->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Mata Pelajaran</label>
                            <select
                                name="detail_nilai[{{ $index }}][mapel_id]"
                                class="form-control"
                            >
                                <option value="">
                                    --Pilih Mata Pelajaran--
                                </option>
                                @foreach ($mapel as $m)
                                    <option
                                        value="{{ $m->id }}"
                                        {{ $detail->mapel_id == $m->id ? 'selected' : '' }}
                                    >
                                        {{ $m->nama_mapel }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Nilai</label>
                            <input
                                type="number"
                                name="detail_nilai[{{ $index }}][nilai]"
                                class="form-control"
                                value="{{ $detail->nilai }}"
                            />
                        </div>
                        <div class="form-group mb-3">
                            <label>Keterangan</label>
                            <textarea
                                name="detail_nilai[{{ $index }}][keterangan]"
                                class="form-control"
                            >
{{ $detail->keterangan }}</textarea
                            >
                        </div>
                        <button
                            type="button"
                            class="btn btn-danger btn-sm mb-3 hapus-detail"
                        >
                            Hapus
                        </button>
                        <hr />
                    </div>
                @endforeach
            </div>

            <!-- Tombol Tambah Mata Pelajaran -->
            <button
                type="button"
                id="tambah-detail"
                class="btn btn-success mb-3"
            >
                Tambah Mata Pelajaran
            </button>

            <h3>Detail Ketidakhadiran</h3>
            <div class="form-group mb-3">
                <label for="sakit">Jumlah Hari Sakit</label>
                <input
                    type="number"
                    name="ketidakhadiran[sakit]"
                    id="sakit"
                    class="form-control"
                    value="{{ old('ketidakhadiran.sakit', $ketidakhadiran->sakit ?? 0) }}"
                    required
                    min="0"
                />
                @error('ketidakhadiran.sakit')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="izin">Jumlah Hari Izin</label>
                <input
                    type="number"
                    name="ketidakhadiran[izin]"
                    id="izin"
                    class="form-control"
                    value="{{ old('ketidakhadiran.izin', $ketidakhadiran->izin ?? 0) }}"
                    required
                    min="0"
                />
                @error('ketidakhadiran.izin')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="tanpa_keterangan">
                    Jumlah Hari Tanpa Keterangan
                </label>
                <input
                    type="number"
                    name="ketidakhadiran[tanpa_keterangan]"
                    id="tanpa_keterangan"
                    class="form-control"
                    value="{{ old('ketidakhadiran.tanpa_keterangan', $ketidakhadiran->tanpa_keterangan ?? 0) }}"
                    required
                    min="0"
                />
                @error('ketidakhadiran.tanpa_keterangan')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let detailIndex = {{ $nilai->detailNilai->count() }}; // Mulai dari jumlah elemen yang sudah ada

            // Event listener untuk tombol "Tambah Mata Pelajaran"
            document.getElementById('tambah-detail').addEventListener('click', function () {
                const detailContainer = document.getElementById('detail-nilai');
                const newDetail = document.createElement('div');
                newDetail.classList.add('detail-item');

                newDetail.innerHTML = `
                    <div class="form-group mb-3">
                        <label>Guru</label>
                        <select name="detail_nilai[${detailIndex}][guru_id]" class="form-control">
                            <option value="">--Pilih Guru--</option>
                            @foreach($guru as $gru)
                                <option value="{{ $gru->id }}">{{ $gru->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Mata Pelajaran</label>
                        <select name="detail_nilai[${detailIndex}][mapel_id]" class="form-control">
                            <option value="">--Pilih Mata Pelajaran--</option>
                            @foreach($mapel as $m)
                                <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Nilai</label>
                        <input type="number" name="detail_nilai[${detailIndex}][nilai]" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Keterangan</label>
                        <textarea name="detail_nilai[${detailIndex}][keterangan]" class="form-control"></textarea>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm mb-3 hapus-detail">Hapus</button>
                    <hr>
                `;
                detailContainer.appendChild(newDetail);
                detailIndex++;
            });

            // Event delegation untuk tombol hapus yang baru ditambahkan
            document.getElementById('detail-nilai').addEventListener('click', function (event) {
                if (event.target.classList.contains('hapus-detail')) {
                    // Hapus detail item ketika tombol hapus ditekan
                    event.target.closest('.detail-item').remove();
                }
            });
        });
    </script>
</x-app-layout>
