<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }
    public function create()
    {
        return view('produk.tambah');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga'       => 'required|numeric',
            'stok'        => 'required|numeric',
        ]);

        Produk::create($request->all());

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga'       => 'required|numeric',
            'stok'        => 'required|numeric',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update($request->all());

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
