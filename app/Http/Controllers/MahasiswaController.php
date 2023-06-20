<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return Mahasiswa::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        return Mahasiswa::create($request->all());
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return $mahasiswa;
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        $mahasiswa->update($request->all());

        return $mahasiswa;
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return response()->json(['message' => 'Mahasiswa deleted']);
    }
}