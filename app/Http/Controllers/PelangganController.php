<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = DB::table('pelanggan')->orderByDesc('id')->get();

        return view('pelanggan.index', compact('pelanggan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'telepon' => ['required', 'string', 'max:30'],
            'alamat' => ['required', 'string'],
        ]);

        DB::table('pelanggan')->insert($validated);

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(int $id)
    {
        $row = DB::table('pelanggan')->where('id', $id)->first();

        abort_if(!$row, 404);

        return view('pelanggan.edit', compact('row'));
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'telepon' => ['required', 'string', 'max:30'],
            'alamat' => ['required', 'string'],
        ]);

        $updated = DB::table('pelanggan')->where('id', $id)->update($validated);

        if (!$updated && !DB::table('pelanggan')->where('id', $id)->exists()) {
            abort(404);
        }

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(int $id)
    {
        $deleted = DB::table('pelanggan')->where('id', $id)->delete();

        if (!$deleted) {
            abort(404);
        }

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
