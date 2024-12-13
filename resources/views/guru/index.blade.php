<x-app-layout>
    <x-message></x-message>
    <div class="container">
        <h1>Tabel Guru</h1>
        <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">
            Tambah Guru
        </a>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>NIP</th>
                    <th>Mata Pelajaran</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gurus as $guru)
                    <tr>
                        <td>{{ $guru->nama }}</td>
                        <td>{{ $guru->nip }}</td>
                        <td>{{ $guru->mata_pelajaran }}</td>
                        <td>{{ $guru->alamat }}</td>
                        <td>
                            <a
                                href="{{ route('guru.edit', $guru->id) }}"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>
                            <form
                                action="{{ route('guru.destroy', $guru->id) }}"
                                method="POST"
                                style="display: inline"
                            >
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                >
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
