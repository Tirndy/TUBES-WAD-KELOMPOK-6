<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
    <h1>Data Pelanggan</h1>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

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

    <div class="card">
        <h2>Tambah Data Pelanggan</h2>

        <form action="{{ route('pelanggan.store') }}" method="POST">
            @csrf

            <label>Nama Lengkap</label>
            <input type="text" name="nama" maxlength="100" value="{{ old('nama') }}" required>

            <label>Email</label>
            <input type="email" name="email" maxlength="150" value="{{ old('email') }}" required>

            <label>Nomor Telepon</label>
            <input type="text" name="telepon" maxlength="30" value="{{ old('telepon') }}" required>

            <label>Alamat</label>
            <textarea name="alamat" rows="3" required>{{ old('alamat') }}</textarea>

            <button type="submit">Simpan Data</button>
        </form>
    </div>

    <div class="card">
        <h2>Daftar Pelanggan</h2>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pelanggan as $index => $row)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->telepon }}</td>
                            <td>{!! nl2br(e($row->alamat)) !!}</td>
                            <td class="aksi">
                                <a class="btn-edit" href="{{ route('pelanggan.edit', $row->id) }}">Edit</a>

                                <form action="{{ route('pelanggan.destroy', $row->id) }}"
                                      method="POST" class="form-hapus"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-hapus">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="kosong">Belum ada data pelanggan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
