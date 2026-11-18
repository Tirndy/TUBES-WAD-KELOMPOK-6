
@extends('layouts.app')

@section('title', 'Modul Ekspedisi')

@section('content')
    @php($isAdmin = auth()->user()->role === 'admin')

    <div class="header">
        <h1>Data Ekspedisi</h1>
        <p>{{ $isAdmin ? 'Kelola data ekspedisi pengiriman barang.' : 'Daftar ekspedisi pengiriman barang.' }}</p>
    </div>

    @if ($isAdmin)
        <div class="card">
            <h2>Tambah Ekspedisi Baru</h2>

            @if ($errors->any())
                <div class="alert">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('ekspedisi.store') }}">
                @csrf

                <div class="form-group">
                    <label>Nama Ekspedisi</label>
                    <input type="text" name="nama_ekspedisi"
                        value="{{ old('nama_ekspedisi') }}"
                        required placeholder="Contoh: JNE, J&T">
                </div>

                <div class="form-group">
                    <label>Layanan</label>
                    <select name="layanan" required>
                        @foreach ($layananList as $l)
                            <option value="{{ $l }}" @selected(old('layanan') === $l)>
                                {{ $l }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Zona Ekspedisi</label>
                    <select name="zona" required>
                        @foreach ($zonaList as $z)
                            <option value="{{ $z }}" @selected(old('zona') === $z)>
                                {{ $z }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Tarif (Rp)</label>
                    <input type="number" name="tarif"
                        value="{{ old('tarif') }}"
                        min="0" step="1" required
                        placeholder="Contoh: 15000">
                </div>

                <div class="form-group">
                    <label>Estimasi Pengiriman</label>
                    <input type="text" name="estimasi"
                        value="{{ old('estimasi') }}"
                        required placeholder="Contoh: 2-3 hari">
                </div>

                <button type="submit">Simpan</button>
            </form>
        </div>
    @endif

    <div class="card">
        <h2>Data Ekspedisi</h2>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ekspedisi</th>
                    <th>Layanan</th>
                    <th>Zona</th>
                    <th>Tarif</th>
                    <th>Estimasi</th>

                    @if ($isAdmin)
                        <th>Aksi</th>
                    @endif
                </tr>
            </thead>

            <tbody>
                @forelse ($data as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->nama_ekspedisi }}</td>
                        <td>{{ $row->layanan }}</td>
                        <td>{{ $row->zona }}</td>
                        <td>Rp {{ number_format($row->tarif, 0, ',', '.') }}</td>
                        <td>{{ $row->estimasi }}</td>

                        @if ($isAdmin)
                            <td>
                                <a href="{{ route('ekspedisi.edit', $row) }}" class="edit">Edit</a>
                                <a href="{{ route('ekspedisi.hapus', $row) }}" class="delete">Hapus</a>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ $isAdmin ? 7 : 6 }}" class="kosong">
                            Belum ada data.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
