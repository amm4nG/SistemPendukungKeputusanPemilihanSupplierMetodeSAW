<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\NilaiKriteria;
use Illuminate\Http\Request;

class NilaiKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nilaiKriteria = Kriteria::with('nilaiKriteria')->get();
        return view('admin.sub-kriteria.sub-kriteria', compact(['nilaiKriteria']));
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
                'idKriteria' => ['required'],
                'nilaiKriteria' => ['required'],
                'keterangan' => ['required'],
            ],
            [
                'idKriteria.required' => 'Pastikan Anda memilih kriteria',
                'nilaiKriteria' => 'Pastikan Anda menginputkan nilai kriteria',
                'keterangan' => 'Pastikan Anda mengisi kolom keterangan',
            ],
            [
                'message' => 'gagal',
            ],
        );

        try {
            NilaiKriteria::create([
                'idKriteria' => $request->idKriteria,
                'nilaiKriteria' => $request->nilaiKriteria,
                'keterangan' => $request->keterangan,
            ]);
            return back()->with([
                'message' => 'Penambahan Data Sub Kriteria berhasil dilakukan',
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
                'nilaiKriteriaUpdate' => ['required'],
                'keteranganUpdate' => ['required'],
            ],
            [
                'nilaiKriteriaUpdate' => 'Pastikan Anda menginputkan nilai kriteria',
                'keteranganUpdate' => 'Pastikan Anda mengisi kolom keterangan',
            ],
        );

        try {
            $subKriteria = NilaiKriteria::find($id);
            $subKriteria->nilaiKriteria = $request->nilaiKriteriaUpdate;
            $subKriteria->keterangan = $request->keteranganUpdate;
            $subKriteria->update();

            return back()->with([
                'message' => 'Data sub kriteria berhasil dirubah',
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
            $nilaiKriteria = NilaiKriteria::find($id);
            $nilaiKriteria->delete();
            return back()->with([
                'message' => 'Data sub kriteria berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            return $this->error();
        }
    }
}
