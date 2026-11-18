@extends('layouts.app')

@section('title', 'Hapus Ekspedisi')

@section('content')
    <div class="card">
        <h2>Hapus Ekspedisi</h2>
        <p>Yakin ingin menghapus <strong>{{ $ekspedisi->nama_ekspedisi }}</strong>
           ({{ $ekspedisi->layanan }}, {{ $ekspedisi->zona }})?
           Data yang dihapus tidak bisa dikembalikan.</p>

        <form method="POST" action="{{ route('ekspedisi.destroy', $ekspedisi) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Ya, Hapus</button>
            <a href="{{ route('ekspedisi.index') }}" class="btn-batal">Batal</a>
        </form>
    </div>
@endsection