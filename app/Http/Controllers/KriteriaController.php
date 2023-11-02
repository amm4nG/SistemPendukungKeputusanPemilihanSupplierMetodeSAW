<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriteria = Kriteria::all();
        return view('admin.kriteria.kriteria', compact(['kriteria']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'namaKriteria' => ['required', 'unique:kriteria,namaKriteria'],
                'bobotKriteria' => ['required'],
                'sifatKriteria' => ['required'],
            ],
            [
                'namaKriteria.required' => 'Gagal melakukan penambahan, harap isi <b>Nama Kriteria</b>',
                'namaKriteria.unique' => "<b>$request->namaKriteria</b>" . ' sudah ada didalam daftar kriteria',
                'bobotKriteria.required' => 'Pastikan Anda mengisi <b>Bobot Kriteria</b>',
                'sifatKriteria.required' => 'Pastikan Anda memilih <b>Sifat Kriteria</b>',
            ],
        );

        try {
            Kriteria::create([
                'namaKriteria' => $request->namaKriteria,
                'bobotKriteria' => $request->bobotKriteria,
                'sifatKriteria' => $request->sifatKriteria,
            ]);
            return back()->with([
                'message' => "<b>$request->namaKriteria ($request->sifatKriteria)</b>" . ' berhasil ditambahkan',
            ]);
        } catch (\Throwable $th) {
            return $this->error();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'namaKriteriaUpdate' => ['required', 'unique:kriteria,namaKriteria,' . $id],
                'sifatKriteriaUpdate' => ['required'],
            ],
            [
                'namaKriteriaUpdate.required' => 'Gagal melakukan perubahan, harap isi <b>Nama Kriteria</b>',
                'namaKriteriaUpdate.unique' =>
                    "Gagal melakukan perubahan, kriteria <b>$request->namaKriteriaUpdate</b>" .
                    ' sudah
                ada didalam daftar kriteria',
                'sifatKriteriaUpdate.required' => 'Pastikan Anda memilih sifat kriteria',
            ],
        );
        try {
            $kriteria = Kriteria::find($id);
            $kriteriaOld = $kriteria->namaKriteria;
            $bobotkriteriaOld = $kriteria->bobotKriteria;
            $sifatKriteriaOld = $kriteria->sifatKriteria;
            $kriteria->namaKriteria = $request->namaKriteriaUpdate;
            $kriteria->bobotKriteria = $request->bobotKriteriaUpdate;
            $kriteria->sifatKriteria = $request->sifatKriteriaUpdate;
            $kriteria->update();
            return back()->with([
                'message' =>
                    "Kriteria <b>$kriteriaOld ($bobotkriteriaOld, $sifatKriteriaOld)</b>" .
                    ' berhasil dirubah menjadi
                ' .
                    "<b>$request->namaKriteriaUpdate ($kriteria->bobotKriteria, $request->sifatKriteriaUpdate)</b>",
            ]);
        } catch (\Throwable $th) {
            return $this->error();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $kriteria = Kriteria::find($id);
            $namaKriteria = $kriteria->namaKriteria;
            $sifatKriteria = $kriteria->sifatKriteria;
            $kriteria->delete();
            return back()->with([
                'message' => "Kriteria <b>$namaKriteria ($sifatKriteria)</b>" . ' berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            return $this->error();
        }
    }
}
