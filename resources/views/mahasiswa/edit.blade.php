<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Mahasiswa</h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded p-6">
            <form action="{{ route('mahasiswa.update', $mahasiswa) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                @include('mahasiswa.form')

                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
                <a href="{{ route('mahasiswa.index') }}" class="px-4 py-2 text-gray-600">Batal</a>
            </form>
        </div>
    </div>
</x-app-layout>