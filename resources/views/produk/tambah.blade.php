<!DOCTYPE html>
<link rel="stylesheet" href="{{ asset('css/tambah.css') }}">
<html>
<head>
    <title>Tambah Produk</title>
</head>
<body>

    <h3>Form Tambah Produk</h3>

    <form action="{{ route('produk.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td width="130">Nama Produk</td>
                <td><input type="text" name="nama_produk" required></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td><input type="text" name="kategori"></td>
            </tr>
            <tr>
                <td>Merek</td>
                <td><input type="text" name="merek"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name="harga" required></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="number" name="stok" required></td>
            </tr>
            <tr>
                <td>Berat (gram)</td>
                <td><input type="number" name="berat"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status">
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top;">Deskripsi</td>
                <td><textarea name="deskripsi" rows="3"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn-simpan">Simpan</button>
                    <a href="{{ route('produk.index') }}" class="btn-kembali">Kembali</a>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>