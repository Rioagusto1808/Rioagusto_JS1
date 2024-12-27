<x-app-layout>
    <div class="container py-5">
        <h1 class="mb-4 text-center">Dashboard Pengaduan</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Alasan</th>
                        <th>Status</th>
                        <th>Balasan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengaduan as $index => $pengaduan)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $pengaduan->email }}</td>
                            <td>{{ $pengaduan->alasan }}</td>
                            <td class="text-center">
                                <span
                                    class="badge {{ $pengaduan->status == 'pending' ? 'bg-warning' : 'bg-success' }}"
                                >
                                    {{ ucfirst($pengaduan->status) }}
                                </span>
                            </td>
                            <td>
                                @if ($pengaduan->status == 'dibalas')
                                    {{ $pengaduan->balasan }}
                                @else
                                    <span class="text-muted">
                                        Belum ada balasan
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($pengaduan->status == 'pending')
                                    <form
                                        action="{{ route('pengaduan.reply', $pengaduan->id) }}"
                                        method="POST"
                                    >
                                        @csrf
                                        <div class="mb-2">
                                            <textarea
                                                name="balasan"
                                                class="form-control"
                                                placeholder="Tulis balasan..."
                                                required
                                            ></textarea>
                                        </div>
                                        <button
                                            type="submit"
                                            class="btn btn-primary btn-sm"
                                        >
                                            Kirim Balasan
                                        </button>
                                    </form>
                                @else
                                    <button
                                        class="btn btn-secondary btn-sm"
                                        disabled
                                    >
                                        Sudah Dibalas
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Tidak ada data pengaduan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
