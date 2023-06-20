<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        return Dosen::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:dosens',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ]);

        return Dosen::create($request->all());
    }

    public function show(Dosen $dosen)
    {
        return $dosen;
    }

    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:dosens,nip,' . $dosen->id,
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ]);

        $dosen->update($request->all());

        return $dosen;
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return response()->json(['message' => 'Dosen deleted']);
    }
}