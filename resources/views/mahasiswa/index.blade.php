<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Mahasiswa</h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
        @endif

        @if (auth()->user()->role === 'admin')
            <a href="{{ route('mahasiswa.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded">
                Tambah Mahasiswa
            </a>
        @endif

        <div class="bg-white shadow rounded overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="p-3 border-b">NIM</th>
                        <th class="p-3 border-b">Nama</th>
                        <th class="p-3 border-b">Program Studi</th>
                        <th class="p-3 border-b">Email</th>
                        <th class="p-3 border-b">Angkatan</th>
                        @if (auth()->user()->role === 'admin')
                            <th class="p-3 border-b">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswas as $m)
                        <tr>
                            <td class="p-3 border-b">{{ $m->nim }}</td>
                            <td class="p-3 border-b">{{ $m->nama }}</td>
                            <td class="p-3 border-b">{{ $m->program_studi }}</td>
                            <td class="p-3 border-b">{{ $m->email }}</td>
                            <td class="p-3 border-b">{{ $m->angkatan }}</td>
                            @if (auth()->user()->role === 'admin')
                                <td class="p-3 border-b space-x-2">
                                    <a href="{{ route('mahasiswa.edit', $m) }}" class="text-blue-600">Edit</a>
                                    <form action="{{ route('mahasiswa.destroy', $m) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600">Hapus</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-3 text-center text-gray-500">Belum ada data mahasiswa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>