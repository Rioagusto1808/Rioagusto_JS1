<x-app-layout>
    <div class="container">
        <h1>Tambah Jadwal</h1>

        <x-message></x-message>

        <form action="{{ route('jadwal.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_jadwal" class="form-label">Nama Jadwal</label>
                <input
                    type="text"
                    name="nama_jadwal"
                    id="nama_jadwal"
                    class="form-control"
                />
                @error('nama_jadwal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="periode_mulai" class="form-label">
                    Periode Mulai
                </label>
                <input
                    type="date"
                    name="periode_mulai"
                    id="periode_mulai"
                    class="form-control"
                />
                @error('periode_mulai')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="periode_selesai" class="form-label">
                    Periode Selesai
                </label>
                <input
                    type="date"
                    name="periode_selesai"
                    id="periode_selesai"
                    class="form-control"
                />
                @error('periode_selesai')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div id="detail-container">
                <h4>Detail Jadwal</h4>
                <div class="detail-item mb-3" id="detail-item-0">
                    <label for="details[0][hari]" class="form-label">
                        Hari
                    </label>
                    <select name="details[0][hari]" class="form-control">
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jum'at</option>
                        <option value="Sabtu">Sabtu</option>
                    </select>

                    <label for="details[0][waktu_mulai]" class="form-label">
                        Waktu Mulai
                    </label>
                    <input
                        type="time"
                        name="details[0][waktu_mulai]"
                        class="form-control"
                    />

                    <label for="details[0][waktu_selesai]" class="form-label">
                        Waktu Selesai
                    </label>
                    <input
                        type="time"
                        name="details[0][waktu_selesai]"
                        class="form-control"
                    />

                    <label for="details[0][kelas_id]" class="form-label">
                        Kelas
                    </label>
                    <select name="details[0][kelas_id]" class="form-control">
                        @foreach ($kelas as $kelasItem)
                            <option value="{{ $kelasItem->id }}">
                                {{ $kelasItem->tingkat }}
                            </option>
                        @endforeach
                    </select>

                    <label for="details[0][mapel_id]" class="form-label">
                        Mata Pelajaran
                    </label>
                    <select name="details[0][mapel_id]" class="form-control">
                        @foreach ($mataPelajaran as $mapel)
                            <option value="{{ $mapel->id }}">
                                {{ $mapel->nama_mapel }}
                            </option>
                        @endforeach
                    </select>

                    <label for="details[0][guru_id]" class="form-label">
                        Guru
                    </label>
                    <select name="details[0][guru_id]" class="form-control">
                        @foreach ($gurus as $guru)
                            <option value="{{ $guru->id }}">
                                {{ $guru->nama }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Tombol Hapus Detail -->
                    <button
                        type="button"
                        class="btn btn-danger btn-sm mt-2"
                        onclick="removeDetail(0)"
                    >
                        Hapus Detail
                    </button>
                </div>
            </div>

            <button
                type="button"
                id="add-detail"
                class="btn btn-secondary mb-3"
            >
                Tambah Detail
            </button>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</x-app-layout>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const detailContainer = document.getElementById("detail-container");
        const addDetailButton = document.getElementById("add-detail");
        let detailCount = 1; // Awalnya sudah ada 1 detail
        const maxDetails = 25;

        addDetailButton.addEventListener("click", function() {
            if (detailCount >= maxDetails) {
                alert("Anda hanya bisa menambahkan maksimal " + maxDetails + " detail.");
                return;
            }

            const newDetailIndex = detailCount;
            const newDetailItem = document.createElement("div");
            newDetailItem.classList.add("detail-item", "mb-3");
            newDetailItem.setAttribute("id", "detail-item-" + newDetailIndex);

            newDetailItem.innerHTML = `
                <label for="details[${newDetailIndex}][hari]" class="form-label">Hari</label>
                <select name="details[${newDetailIndex}][hari]" class="form-control">
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jum'at</option>
                    <option value="Sabtu">Sabtu</option>
                </select>

                <label for="details[${newDetailIndex}][waktu_mulai]" class="form-label">Waktu Mulai</label>
                <input type="time" name="details[${newDetailIndex}][waktu_mulai]" class="form-control">

                <label for="details[${newDetailIndex}][waktu_selesai]" class="form-label">Waktu Selesai</label>
                <input type="time" name="details[${newDetailIndex}][waktu_selesai]" class="form-control">

                <label for="details[${newDetailIndex}][kelas_id]" class="form-label">Kelas</label>
                <select name="details[${newDetailIndex}][kelas_id]" class="form-control">
                    @foreach ($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}">{{ $kelasItem->tingkat }}</option>
                    @endforeach
                </select>

                <label for="details[${newDetailIndex}][mapel_id]" class="form-label">Mata Pelajaran</label>
                <select name="details[${newDetailIndex}][mapel_id]" class="form-control">
                    @foreach ($mataPelajaran as $mapel)
                        <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                    @endforeach
                </select>

                <label for="details[${newDetailIndex}][guru_id]" class="form-label">Guru</label>
                <select name="details[${newDetailIndex}][guru_id]" class="form-control">
                    @foreach ($gurus as $guru)
                        <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                    @endforeach
                </select>

                <!-- Tombol Hapus Detail -->
                <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removeDetail(${newDetailIndex})">Hapus Detail</button>
            `;

            detailContainer.appendChild(newDetailItem);
            detailCount++;

            if (detailCount >= maxDetails) {
                addDetailButton.disabled = true;
            }
        });
    });

    // Fungsi untuk menghapus detail
    function removeDetail(index) {
        const detailItem = document.getElementById('detail-item-' + index);
        if (detailItem) {
            detailItem.remove();
            detailCount--;
            // Re-enable the add button if we have space for more details
            if (detailCount < maxDetails) {
                document.getElementById("add-detail").disabled = false;
            }
        }
    }
</script>
