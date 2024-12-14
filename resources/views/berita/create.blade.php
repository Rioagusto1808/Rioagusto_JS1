<x-app-layout>
    <div class="container">
        <h1 class="mb-3">Buat Berita Baru</h1>
        <form
            action="{{ route('berita.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="shadow-lg p-4 rounded-3 bg-light"
        >
            @csrf
            <div class="form-group">
                <label for="user_id">Penulis</label>
                <select name="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option
                            value="{{ $user->id }}"
                            {{ old('user_id') == $user->id ? 'selected' : '' }}
                        >
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" />
            </div>

            <div class="form-group">
                <label for="content">Konten</label>
                <textarea
                    name="content"
                    class="form-control"
                    rows="5"
                ></textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                    <option value="archived">Archived</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Gambar Sampul</label>
                <input type="file" name="image" class="form-control-file" />
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</x-app-layout>
