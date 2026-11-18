
@extends('layouts.app')

@section('title', 'Edit Ekspedisi')

@section('content')
    <div class="header">
        <h1>Edit Data Ekspedisi</h1>
        <p>Silakan ubah data yang ingin diperbarui.</p>
    </div>

    <div class="card">
        <h2>Form Edit Ekspedisi</h2>

        @if ($errors->any())
            <div class="alert">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('ekspedisi.update', $ekspedisi) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Ekspedisi</label>
                <input type="text" name="nama_ekspedisi"
                    value="{{ old('nama_ekspedisi', $ekspedisi->nama_ekspedisi) }}"
                    required>
            </div>

            <div class="form-group">
                <label>Layanan</label>
                <select name="layanan" required>
                    @foreach ($layananList as $l)
                        <option value="{{ $l }}" @selected(old('layanan', $ekspedisi->layanan) === $l)>
                            {{ $l }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Zona Ekspedisi</label>
                <select name="zona" required>
                    @foreach ($zonaList as $z)
                        <option value="{{ $z }}" @selected(old('zona', $ekspedisi->zona) === $z)>
                            {{ $z }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Tarif (Rp)</label>
                <input type="number" name="tarif"
                    value="{{ old('tarif', $ekspedisi->tarif) }}"
                    min="0" step="1" required>
            </div>

            <div class="form-group">
                <label>Estimasi Pengiriman</label>
                <input type="text" name="estimasi"
                    value="{{ old('estimasi', $ekspedisi->estimasi) }}"
                    required placeholder="Contoh: 2-3 hari">
            </div>

            <button type="submit">Update</button>
            <a href="{{ route('ekspedisi.index') }}" class="btn-batal">Batal</a>
        </form>
    </div>
@endsection
