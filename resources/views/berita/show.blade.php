<x-app-layout>
    <div class="container py-5">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <!-- Judul Berita -->
                <h1 class="mb-4 text-primary fw-bold">{{ $berita->judul }}</h1>

                <!-- Status dan Penulis -->
                <p>
                    <strong>Status:</strong>
                    <span
                        class="badge @if ($berita->status == "published")
                            bg-success
                        @elseif ($berita->status == "draft")
                            bg-warning
                        @else
                            bg-secondary
                        @endif"
                    >
                        {{ ucfirst($berita->status) }}
                    </span>
                </p>
                <p>
                    <strong>Penulis:</strong>
                    {{ $berita->user->name }}
                </p>

                <!-- Konten -->
                <div class="mb-4">
                    <h5 class="fw-semibold">Konten:</h5>
                    <p class="text-muted">{{ $berita->content }}</p>
                </div>

                <!-- Gambar Sampul -->

                @if ($berita->file)
                    <div class="mb-4">
                        <h5 class="fw-semibold">Gambar Sampul:</h5>
                        <div>
                            <img
                                src="{{ route("image.show", $berita->file->id) }}"
                                alt="Gambar Sampul"
                                class="img-fluid rounded shadow-sm"
                                style="max-width: 100%; height: auto"
                            />
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning">
                        Tidak ada gambar tersedia.
                    </div>
                @endif

                <!-- Tombol Kembali -->
                <a
                    href="{{ route("berita.index") }}"
                    class="btn btn-secondary shadow-sm"
                >
                    <i class="bi bi-arrow-left-circle"></i>
                    Kembali ke Daftar Berita
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .container {
        font-family: 'Poppins', sans-serif;
    }

    .card {
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
        background-color: #ffffff;
    }

    h1 {
        font-size: 28px;
        color: #333;
    }

    p {
        font-size: 16px;
        color: #555;
    }

    .btn-secondary {
        font-size: 14px;
        padding: 10px 20px;
        border-radius: 8px;
    }

    img {
        max-height: 200px;
    }
</style>
