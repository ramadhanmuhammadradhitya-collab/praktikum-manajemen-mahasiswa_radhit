<?php

namespace App\Http\Controllers;

use App\Jobs\ImportMahasiswa2Job;
use Illuminate\Http\Request;

class Mahasiswa2ImportController extends Controller
{
    public function create()
    {
        return view('mahasiswa2.import');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'file' => [
                    'required',
                    'file',
                    'mimes:xlsx,xls',
                    'max:10240',
                ],
            ],
            [
                'file.required' => 'File Excel wajib dipilih.',
                'file.file' => 'File yang diupload tidak valid.',
                'file.mimes' => 'File harus berformat XLS atau XLSX.',
                'file.max' => 'Ukuran file maksimal 10 MB.',
            ]
        );

        // Simpan file terlebih dahulu
        $path = $request->file('file')->store('imports');

        // Masukkan Job ke Redis Queue
        ImportMahasiswa2Job::dispatch($path);

        return redirect()
            ->route('mahasiswa2.import')
            ->with(
                'success',
                'File berhasil diupload dan sedang diproses.'
            );
    }
}