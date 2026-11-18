<!DOCTYPE html>
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<html>
<head>
    <title>Daftar Produk</title>
</head>
<body>

    <h2>Daftar Produk Toko Online</h2>

    @if(session('success'))
        <div class="pesan-sukses">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('produk.create') }}" class="btn-tambah">+ Tambah Produk Baru</a>

    <table>
        <thead>
            <tr>
                <th width="30">No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Merek</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Berat</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th width="120">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produks as $key => $row)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $row->nama_produk }}</td>
                <td>{{ $row->kategori }}</td>
                <td>{{ $row->merek }}</td>
                <td>Rp {{ number_format($row->harga, 0, ',', '.') }}</td>
                <td>{{ $row->stok }}</td>
                <td>{{ $row->berat }} gr</td>
                <td>{{ $row->deskripsi }}</td>
                <td>{{ $row->status }}</td>
                <td>
                    <a href="{{ route('produk.edit', $row->id) }}" class="btn-aksi btn-edit">Edit</a>
                    <form action="{{ route('produk.destroy', $row->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-aksi btn-hapus">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" align="center">Data belum ada</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>