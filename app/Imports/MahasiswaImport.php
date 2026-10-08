<?php

namespace App\Imports;

use App\Models\Mahasiswa2;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class MahasiswaImport implements ToModel, WithStartRow, SkipsEmptyRows
{
    public function startRow(): int
    {
        return 1;
    }

    public function model(array $row)
    {
        if (empty($row[0])) {
            return null;
        }

        return new Mahasiswa2([
            'nim' => $row[0],
            'nama' => $row[1],
            'jurusan' => $row[2],
            'email' => $row[3],
        ]);
    }
}