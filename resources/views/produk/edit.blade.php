<!DOCTYPE html>
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
<html>
<head>
    <title>Edit Produk</title>
</head>
<body>

    <h3>Form Edit Produk</h3>

    <form action="{{ route('produk.update', $produk->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td width="130">Nama Produk</td>
                <td><input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" required></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td><input type="text" name="kategori" value="{{ $produk->kategori }}"></td>
            </tr>
            <tr>
                <td>Merek</td>
                <td><input type="text" name="merek" value="{{ $produk->merek }}"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name="harga" value="{{ $produk->harga }}" required></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="number" name="stok" value="{{ $produk->stok }}" required></td>
            </tr>
            <tr>
                <td>Berat (gram)</td>
                <td><input type="number" name="berat" value="{{ $produk->berat }}"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status">
                        <option value="Aktif" {{ $produk->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Nonaktif" {{ $produk->status == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top;">Deskripsi</td>
                <td><textarea name="deskripsi" rows="3">{{ $produk->deskripsi }}</textarea></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn-update">Update</button>
                    <a href="{{ route('produk.index') }}" class="btn-kembali">Kembali</a>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>