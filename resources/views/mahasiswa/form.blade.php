<div>
    <x-input-label for="nim" value="NIM" />
    <x-text-input id="nim" name="nim" type="text" class="mt-1 block w-full" value="{{ old('nim', $mahasiswa->nim ?? '') }}" />
    <x-input-error :messages="$errors->get('nim')" class="mt-2" />
</div>

<div>
    <x-input-label for="nama" value="Nama" />
    <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" value="{{ old('nama', $mahasiswa->nama ?? '') }}" />
    <x-input-error :messages="$errors->get('nama')" class="mt-2" />
</div>

<div>
    <x-input-label for="program_studi" value="Program Studi" />
    <x-text-input id="program_studi" name="program_studi" type="text" class="mt-1 block w-full" value="{{ old('program_studi', $mahasiswa->program_studi ?? '') }}" />
    <x-input-error :messages="$errors->get('program_studi')" class="mt-2" />
</div>

<div>
    <x-input-label for="email" value="Email" />
    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" value="{{ old('email', $mahasiswa->email ?? '') }}" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<div>
    <x-input-label for="angkatan" value="Angkatan" />
    <x-text-input id="angkatan" name="angkatan" type="text" class="mt-1 block w-full" value="{{ old('angkatan', $mahasiswa->angkatan ?? '') }}" />
    <x-input-error :messages="$errors->get('angkatan')" class="mt-2" />
</div>