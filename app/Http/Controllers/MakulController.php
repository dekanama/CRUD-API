<?php

namespace App\Http\Controllers;


use App\Models\Makul;
use Illuminate\Http\Request;

class MakulController extends Controller
{
    public function index()
    {
        return Makul::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode_makul' => 'required|unique:makuls',
            'semester'=>'required',
        ]);

        return Makul::create($request->all());
    }

    public function show(Makul $makul)
    {
        return $makul;
    }

    public function update(Request $request, Makul $makul)
    {
        $request->validate([
            'nama' => 'required',
            'kode_makul' => 'required|unique:makuls,kode_makul,' . $makul->id,
            'semester'=>'required',
        ]);

        $makul->update($request->all());

        return $makul;
    }

    public function destroy(Makul $makul)
    {
        $makul->delete();

        return response()->json(['message' => 'Makul deleted']);
    }
}