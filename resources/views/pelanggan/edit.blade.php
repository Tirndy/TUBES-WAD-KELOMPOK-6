<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pelanggan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
    <div class="card">
        <h1>Edit Data Pelanggan</h1>

        @if ($errors->any())
            <div class="error">
                <strong>Periksa kembali data yang dimasukkan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pelanggan.update', $row->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nama Lengkap</label>
            <input type="text" name="nama" maxlength="100"
                   value="{{ old('nama', $row->nama) }}" required>

            <label>Email</label>
            <input type="email" name="email" maxlength="150"
                   value="{{ old('email', $row->email) }}" required>

            <label>Nomor Telepon</label>
            <input type="text" name="telepon" maxlength="30"
                   value="{{ old('telepon', $row->telepon) }}" required>

            <label>Alamat</label>
            <textarea name="alamat" rows="3" required>{{ old('alamat', $row->alamat) }}</textarea>

            <button type="submit">Simpan Perubahan</button>
            <a href="{{ route('pelanggan.index') }}" class="btn-kembali">Batal</a>
        </form>
    </div>
</div>
</body>
</html>
