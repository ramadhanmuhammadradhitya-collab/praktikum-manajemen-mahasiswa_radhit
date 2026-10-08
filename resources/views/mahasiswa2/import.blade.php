<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Import Data Mahasiswa 2</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .title {
            margin-bottom: 10px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .description {
            margin-bottom: 25px;
            color: #666;
            line-height: 1.6;
        }

        .alert {
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        .format-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 25px;
            overflow-x: auto;
        }

        .format-box h3 {
            margin-top: 0;
            font-size: 18px;
        }

        .format-box table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .format-box th,
        .format-box td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }

        .format-box th {
            background: #e5e7eb;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        .help-text {
            display: block;
            margin-top: 8px;
            color: #777;
            font-size: 13px;
        }

        .btn {
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            background: #2563eb;
            color: white;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .required {
            color: red;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <div class="title">
            Import Data Mahasiswa 2
        </div>

        <div class="description">
            Upload file Excel untuk menambahkan data
            mahasiswa ke dalam tabel mahasiswa2.
        </div>

        {{-- Pesan berhasil --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Pesan error --}}
        @if ($errors->any())
            <div class="alert alert-danger">

                <strong>Terjadi kesalahan:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif

        {{-- Format Excel --}}
        <div class="format-box">

            <h3>Format File Excel</h3>

            <p>
                Pastikan baris pertama Excel memiliki
                nama kolom berikut:
            </p>

            <table>

                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Email</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>230001</td>
                        <td>Budi Santoso</td>
                        <td>Informatika</td>
                        <td>budi@gmail.com</td>
                    </tr>

                    <tr>
                        <td>230002</td>
                        <td>Siti Aminah</td>
                        <td>Sistem Informasi</td>
                        <td>siti@gmail.com</td>
                    </tr>

                </tbody>

            </table>

        </div>

        {{-- Form Upload --}}
        <form
            action="{{ route('mahasiswa2.import.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="form-group">

                <label
                    for="file"
                    class="form-label"
                >
                    File Excel
                    <span class="required">*</span>
                </label>

                <input
                    type="file"
                    id="file"
                    name="file"
                    class="form-control"
                    accept=".xlsx,.xls"
                    required
                >

                <span class="help-text">
                    Format yang diperbolehkan: XLS dan XLSX.
                    Maksimal ukuran file 10 MB.
                </span>

            </div>

            <button
                type="submit"
                class="btn"
            >
                Import Data
            </button>

        </form>

    </div>

</div>

</body>
</html>