<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\NilaiKriteria;
use App\Models\NilaiSupplier;
use App\Models\Supplier;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriteria = Kriteria::all();
        $supplier = Supplier::with('nilaiSupplier')->get();
        $dataSupplier = [];
        foreach ($supplier as $item) {
            foreach ($item->nilaiSupplier as $nilai) {
                $nilaiKriteria = NilaiKriteria::find($nilai->idNilaiKriteria);
                array_push($dataSupplier, [
                    'idSupplier' => $item->id,
                    'idKriteria' => $nilai->idKriteria,
                    'nilaiSupplier' => $nilaiKriteria->nilaiKriteria,
                    'sifatKriteria' => $nilaiKriteria->kriteria->sifatKriteria,
                ]);
                // echo $nilaiKriteria->nilaiKriteria;
            }
        }
        $nilaiData = [];
        foreach ($kriteria as $value) {
            $dataNilaiSupplier = NilaiSupplier::where('idKriteria', $value->id)->get();
            $normalisasi = [];
            foreach ($dataNilaiSupplier as $nilai) {
                $nilaiKriteria = NilaiKriteria::find($nilai->idNilaiKriteria);
                array_push($normalisasi, $nilaiKriteria->nilaiKriteria);
            }
            if ($value->sifatKriteria === 'benefit') {
                array_push($nilaiData, [
                    'idKriteria' => $value->id,
                    'nilai' => max($normalisasi),
                    'bobot' => $value->bobotKriteria,
                ]);
            } else {
                array_push($nilaiData, [
                    'idKriteria' => $value->id,
                    'nilai' => min($normalisasi),
                    'bobot' => $value->bobotKriteria,
                ]);
            }
            $normalisasi = [];
        }
        // dd($nilaiData);
        return view('admin.hasil.hasil', compact(['kriteria', 'supplier', 'dataSupplier', 'nilaiData']));
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
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
