<x-app-layout>
    <div class="container">
        <h1 class="mb-4">Edit Berita</h1>
        <form
            action="{{ route('berita.update', $berita->id) }}"
            method="POST"
            enctype="multipart/form-data"
            class="shadow-lg p-4 rounded-3 bg-light"
        >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="user_id">Penulis</label>
                <select name="user_id" class="form-control" required>
                    @foreach ($users as $user)
                        <option
                            value="{{ $user->id }}"
                            {{ $user->id == $berita->user_id ? 'selected' : '' }}
                        >
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="judul">Judul</label>
                <input
                    type="text"
                    name="judul"
                    class="form-control"
                    value="{{ old('judul', $berita->judul) }}"
                    required
                />
            </div>

            <div class="form-group">
                <label for="content">Konten</label>
                <textarea name="content" class="form-control" rows="5" required>
{{ old('content', $berita->content) }}</textarea
                >
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option
                        value="draft"
                        {{ $berita->status == 'draft' ? 'selected' : '' }}
                    >
                        Draft
                    </option>
                    <option
                        value="published"
                        {{ $berita->status == 'published' ? 'selected' : '' }}
                    >
                        Published
                    </option>
                    <option
                        value="archived"
                        {{ $berita->status == 'archived' ? 'selected' : '' }}
                    >
                        Archived
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Edit Gambar :</label>
                <input type="file" name="image" class="form-control-file" />
                @if ($berita->file_id)
                    <p>
                        Gambar Saat Ini:
                        <br />
                        <img
                            src="{{ route('image.show', $berita->file->id) }}"
                            alt="Gambar Sampul"
                            width="150"
                        />
                    </p>
                @endif
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</x-app-layout>
