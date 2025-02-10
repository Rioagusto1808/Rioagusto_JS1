<x-app-layout>
    <div class="container mb-4">
        <h1 class="mb-4">Daftar Nilai</h1>
        <div class="d-flex justify-content-between mb-4">
            @if (Auth::check() && Auth::user()->hasRole('Guru'))
                <!-- "Tambah Nilai" Button -->
                <a
                    href="{{ route('nilai.create') }}"
                    class="btn btn-success shadow-sm"
                >
                    <i class="bi bi-person-plus"></i>
                    Tambah Nilai
                </a>
            @endif

            <!-- Search Form -->
            <form
                method="GET"
                action="{{ route('nilai.index') }}"
                class="d-flex flex-wrap gap-3"
            >
                <div class="form-group mb-0">
                    <select name="siswa_id" id="siswa_id" class="form-control">
                        <option value="">--Pilih Siswa--</option>
                        @foreach ($siswaIdList as $s)
                            <option
                                value="{{ $s->id }}"
                                {{ request('siswa_id') == $s->id ? 'selected' : '' }}
                            >
                                {{ $s->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-0">
                    <select name="semester" id="semester" class="form-control">
                        <option value="">--Pilih Semester--</option>
                        <option
                            value="1"
                            {{ request('semester') == 1 ? 'selected' : '' }}
                        >
                            Semester 1
                        </option>
                        <option
                            value="2"
                            {{ request('semester') == 2 ? 'selected' : '' }}
                        >
                            Semester 2
                        </option>
                        <option
                            value="3"
                            {{ request('semester') == 3 ? 'selected' : '' }}
                        >
                            Semester 3
                        </option>
                        <option
                            value="4"
                            {{ request('semester') == 4 ? 'selected' : '' }}
                        >
                            Semester 4
                        </option>
                        <option
                            value="5"
                            {{ request('semester') == 5 ? 'selected' : '' }}
                        >
                            Semester 5
                        </option>
                        <option
                            value="6"
                            {{ request('semester') == 6 ? 'selected' : '' }}
                        >
                            Semester 6
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>

        <div class="table-responsive">
            <table
                class="table table-hover table-bordered table-striped table-sm shadow-sm rounded-3"
            >
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Siswa</th>
                        <th>Guru</th>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
                        <th>Di Buat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nilai as $index => $item)
                        <tr>
                            <td>{{ $nilai->firstItem() + $index }}</td>
                            <td>{{ $item->siswa->nama }}</td>
                            <td>{{ $item->guru->nama }}</td>
                            <td>{{ $item->tahun_ajaran }}</td>
                            <td>{{ $item->semester }}</td>
                            <td>
                                {{ $item->created_at->format('d, F Y [H:i:s]') }}
                            </td>
                            <td>
                                <a
                                    href="{{ route('nilai.show', $item->id) }}"
                                    class="btn btn-info btn-sm"
                                >
                                    <i class="bi bi-eye"></i>
                                </a>
                                @if (Auth::user()->can('Guru'))
                                    <a
                                        href="{{ route('nilai.edit', $item->id) }}"
                                        class="btn btn-warning btn-sm"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form
                                        action="{{ route('nilai.destroy', $item->id) }}"
                                        method="POST"
                                        style="display: inline"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin?')"
                                        >
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    @if ($nilai->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center">
                                Data Tidak Ditemukan
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-end">
            {{ $nilai->links() }}
        </div>
    </div>
</x-app-layout>
