<?php

namespace App\Http\Controllers;

use App\Models\Ekspedisi;
use Illuminate\Http\Request;

class EkspedisiController extends Controller
{
    private array $layananList = ['Reguler', 'Express'];

    private array $zonaList = ['Jawa', 'Bali', 'Luar Jawa'];

    private function rules(): array
    {
        return [
            'nama_ekspedisi' => 'required|string|max:100',
            'layanan'        => 'required|in:Reguler,Express',
            'zona'           => 'required|in:Jawa,Bali,Luar Jawa',
            'tarif'          => 'required|integer|min:0',
            'estimasi'       => 'required|string|max:50',
        ];
    }

    public function index()
    {
        return view('ekspedisi.index', [
            'data'        => Ekspedisi::orderByDesc('id')->get(),
            'layananList' => $this->layananList,
            'zonaList'    => $this->zonaList,
        ]);
    }

    // Create
    public function store(Request $request)
    {
        Ekspedisi::create($request->validate($this->rules()));

        return redirect()->route('ekspedisi.index');
    }

    // Edit
    public function edit(Ekspedisi $ekspedisi)
    {
        return view('ekspedisi.edit', [
            'ekspedisi'   => $ekspedisi,
            'layananList' => $this->layananList,
            'zonaList'    => $this->zonaList,
        ]);
    }

    // Update
    public function update(Request $request, Ekspedisi $ekspedisi)
    {
        $ekspedisi->update($request->validate($this->rules()));

        return redirect()->route('ekspedisi.index');
    }

    // Halaman konfirmasi hapus
    public function hapus(Ekspedisi $ekspedisi)
    {
        return view('ekspedisi.hapus', ['ekspedisi' => $ekspedisi]);
    }

    // Delete
    public function destroy(Ekspedisi $ekspedisi)
    {
        $ekspedisi->delete();

        return redirect()->route('ekspedisi.index');
    }
}
